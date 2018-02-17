<?php
	require('../include/admin.php');

	$mw->checkHost();

	# Generate $_POST and/or $_GET variables
	$xss = $mw->query($_POST, 'xss');

	# Clear user and login $_COOKIE here
	setcookie('_uid', '', time() - 3600, $basePath);
	setcookie('_uis', '', time() - 3600, $basePath);
	setcookie('_uir', '', time() - 3600, $basePath);

	# Detect form submit mode and id
	if(empty($xss['mode']) || empty($xss['form_id'])) {
		die('Warning! system stop working due to invalid config.');
	}

	# LOGIN ############################################

	if($xss['mode'] == 'login') {
		# Check empty input
		if(empty($xss['email']) || empty($xss['password'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please type email address and password.');
		}

		# Check valid email address
		$check_email = $mw->checkEmail(array($xss['email']));
		if(!$check_email) {
			$mw->returnError($xss['form_id'], $referer, 'Invalid email address, please try again.');
		}

		# Load user datas
		$db->connect();
		$data = $db->select(" select id, hash, salt, status from ".$prefix."users where email = '".$xss['email']."' ");
		$db->close();
		if(!$data) {
			$mw->returnError($xss['form_id'], $referer, 'This email address doesn&#39;t exists.');
		}

		$data = $data['0'];

		# Check user status
		if($data['status'] != 'enable') {
			$mw->returnError($xss['form_id'], $referer, 'This user has been disabled, please contact Administrator.');
		}

		# Check user password
		$hashCheck = $ph->hashCheck($data['hash'], $data['salt'], $xss['password']);
		if(!$hashCheck) {
			$mw->returnError($xss['form_id'], $referer, 'Invalid password, please try again.');
		}

		# Generate variables for setcookie
		$_mt_rand = mt_rand();
		$_uid = md5($_mt_rand);
		$_uis = md5($data['salt']);
		$_uir = mt_rand(1, 16);
		$_uid_new = substr_replace($_uid, $data['id'], $_uir, strlen($_uir));

		# Set all cookie
		setcookie('_uid', $_uid_new, 0, $basePath);
		setcookie('_uis', $_uis, 0, $basePath);
		setcookie('_uir', $_uir.'.'.strlen($data['id']).'.'.$_mt_rand, 0, $basePath);

		header('Location: '.$adminUrl.'dashboard.php');
		die();
	}

	# /LOGIN ############################################

	# LOGOUT ############################################

	if($xss['mode'] == 'logout') {
		$mw->userLogout();
	}

	# /LOGOUT ############################################

	# RESET ############################################

	if($xss['mode'] == 'reset') {
		if(empty($xss['email'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please type email address.');
		}

		$check_email = $mw->checkEmail(array($xss['email']));
		if(!$check_email) {
			$mw->returnError($xss['form_id'], $referer, 'Invalid email address, please try again.');
		}

		$db->connect();
		$data = $db->select(" select id, email, name, status from ".$prefix."users where email = '".$xss['email']."' ");
		$db->close();
		if(!$data) {
			$mw->returnError($xss['form_id'], $referer, 'This email address doesn&#39;t exists.');
		}

		$data = $data['0'];

		if($data['status'] != 'enable') {
			$mw->returnError($xss['form_id'], $referer, 'This user has been disabled, please contact Administrator.');
		}

		$new_password = substr(md5(mt_rand()), 0, 8);
		$hash_password = $ph->hashPassword($new_password);

		$db->connect();
		$update = $db->command(" update ".$prefix."users set hash = '".$hash_password['hash']."', salt = '".$hash_password['salt']."' where id = '".$data['id']."' ");
		$db->close();
		if(!$update) {
			$mw->returnError($xss['form_id'], $referer, 'Cannot reset your password, please try again.');
		}

		require($fullRoot.'phpmailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->IsHTML(true);
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = $cf->get('mailSSL');
		$mail->Host = $cf->get('mailHost');
		$mail->Port = $cf->get('mailPort');
		$mail->Username = $cf->get('mailUsername');
		$mail->Password = $cf->get('mailPassword');
		$mail->CharSet = 'UTF-8';

		$mail->SetFrom($cf->get('mailFrom'), $cf->get['mailName']);
		$mail->ClearReplyTos();
		$mail->AddAddress($data['email'], $data['name']);

		$mail->Subject = 'Request A New Password';

		$mail_content = '
			Hi '.$data['name'].',
			<br /><br />
			You recently requested to reset your current password on account [<a href="mailto:'.$data['email'].'" title="'.$data['email'].'" style="color: #fff;">'.$data['email'].'</a>].
			<br /><br />
			<strong>New informations to use for login:</strong><br />
			Email: <a href="'.$data['email'].'" title="'.$data['email'].'" style="color: #fff;">'.$data['email'].'</a><br />
			New Password: '.$new_password.'
			<br /><br />
			<p style="color: #777;">Sincerely,<br />
			<strong>'.$cf->get('siteName').'</strong></p>
		';

		$message = $cf->get('mailMessage');
		$message = str_replace('{mail_subject}', $mail->Subject, $message);
		$message = str_replace('{mail_content}', $mail_content, $message);
		$message = str_replace('{fullUrl}', $fullUrl, $message);

		$mail->AltBody = $mail_content;
		$mail->WordWrap = 50;

		$mail->MsgHTML($message);

		if(!$mail->Send()) {
			die('Cannot send email.');
		}

		$mw->returnError($xss['form_id'], $adminUrl.'index.php', 'We have sent your new password to email already, please check your email.', 'text_green');
	}

	# /RESET ############################################
?>