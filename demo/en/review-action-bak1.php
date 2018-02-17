<?php
	$mw->checkHost();
	$xss = $mw->query($_POST, 'xss');
	
	require_once($fullRoot.'include/recaptchalib.php');
	$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
	
	if (!$resp->is_valid) {
		$mw->phpAjax($xss['form_id'], 'The reCAPTCHA wasn&#39;t entered correctly. Go back and try it again.', 'no', 'no');
	} else {
		if(empty($xss['name']) || empty($xss['email']) || empty($xss['rate']) || empty($xss['text']) || empty($xss['profile_id'])) {
			$mw->phpAjax($xss['form_id'], 'Please complete all required fields.', 'no', 'no');
		}

		$check_email = $mw->checkEmail(array($xss['email']));
		if(!$check_email) {
			$mw->phpAjax($xss['form_id'], 'Invalid email address, please try again.', 'no', 'no');
		}
		
		$db->report = true;
		$db->connect();
		$insert = $db->command(" insert into ".$prefix."reviews (profile_id, name, email, text, rate, recaptcha, locked, _read, status, date_time, update_time, ip, user_agent, update_ip, update_user_agent) values ('".$xss['profile_id']."', '".$xss['name']."', '".$xss['email']."', '".nl2br($xss['text'])."', '".$xss['rate']."', '".$xss['recaptcha_response_field']."', 'no', 'no', 'disabled', '".$requestDateTime."', '".$requestDateTime."', '".$clientIp."', '".$userAgent."', '".$clientIp."', '".$userAgent."') ");
		$db->close();
		if(!$insert) {
			$mw->phpAjax($xss['form_id'], 'Cannot save record, please try again.', 'no', 'no');
		} else {
			$db->connect();
			$db->command(" update ".$prefix."profiles set _review = _review + 1 where id = '".$xss['profile_id']."' ");
			$db->close();
			
			$mw->phpAjax($xss['form_id'], 'Thank you for submitting your informations.', 'no', 'yes');
		}
	}
?>