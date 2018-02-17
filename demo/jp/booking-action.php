<?php
	$mw->checkHost();
	$xss = $mw->query($_POST, 'xss');

	require_once($fullRoot.'include/recaptchalib.php');
	$resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

	$referer = $fullUrl.$sysLang.'/booking-form.html';

	if(!$resp->is_valid) {
		$mw->returnError($xss['form_id'], $referer, 'reCAPTCHAのは正しく入力されていませんでした。戻って、もう一度それを試してみてください。');
	} else {
		if(empty($xss['service']) || (empty($xss['1st_choice']) && empty($xss['1st_alternative']) && empty($xss['2nd_alternative']) && empty($xss['2nd_team'])) || empty($xss['date']) || empty($xss['salutation']) || empty($xss['first_name']) || empty($xss['last_name']) || empty($xss['email']) || empty($xss['hotel']) || empty($xss['phone_number']) || empty($xss['room_number']) || empty($xss['contact'])) {
			$mw->returnError($xss['form_id'], $referer, 'すべての必須フィールドを入力してください。');
		}

		$check_email = $mw->checkEmail(array($xss['email']));
		if(!$check_email) {
			$mw->returnError($xss['form_id'], $referer, '無効な電子メールアドレス、もう一度試してください。');
		}

		$refno = 'DDBE-'.date('Ymd-', $requestTime).substr(preg_replace('/[^0-9]/i', '', SESSIONID), 0, 6);

		$db->connect();
		$insert = $db->command(" insert into ".$prefix."bookings (refno, service, 1st_choice, 1st_alternative, 2nd_alternative, 2nd_team, date, hour, min, duration, outfit, special, salutation, first_name, last_name, email, phone_number, hotel, room_number, address, contact, status, date_time, update_time, ip, user_agent, update_ip, update_user_agent) values ('".$refno."', '".$xss['service']."', '".$xss['1st_choice']."', '".$xss['1st_alternative']."', '".$xss['2nd_alternative']."', '".$xss['2nd_team']."', '".$xss['date']."', '".$xss['hour']."', '".$xss['min']."', '".$xss['duration']."', '".$xss['outfit']."', '".nl2br($xss['special'])."', '".$xss['salutation']."', '".$xss['first_name']."', '".$xss['last_name']."', '".$xss['email']."', '".$xss['phone_number']."', '".$xss['hotel']."', '".$xss['room_number']."', '".$xss['address']."', '".$xss['contact']."', 'waiting', '".$requestDateTime."', '".$requestDateTime."', '".$clientIp."', '".$userAgent."', '".$clientIp."', '".$userAgent."') ");
		$db->close();
		if(!$insert) {
			$mw->returnError($xss['form_id'], $referer, 'レコードを保存することはできません。もう一度試してください。');
		}

		$db->connect();
		foreach($array_escort_title as $key => $value) {
			$db->command(" update ".$prefix."profiles set _booking = _booking + 1 where id = '".$xss[$key]."' ");
		}
		$db->close();

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
		$mail->AddAddress($bookingEmail, $cf->get('siteName'));
		$mail->AddCC($bookingEmail, $cf->get('siteName'));
		//$mail->AddAddress('nopphasin.arayasirikul@gmail.com', $cf->get('siteName'));

		$mail->Subject = '[DDBE] Booking Details from '.$xss['first_name'].' '.$xss['last_name'];

		$msg = '';
		foreach($xss as $key => $value) {
			if(!in_array($key, array('mode', 'form_id', 'recaptcha_challenge_field', 'recaptcha_response_field'))) {
				$value = ($key == 'service') ? $array_service[$value] : $value;
				$value = ($key == 'duration') ? $array_duration[$value] : $value;
				$value = ($key == 'outfit') ? $array_outfit[$value] : $value;
				$value = ($key == 'special') ? stripcslashes(nl2br($value)) : $value;
				$value = ($key == 'salutation') ? $array_salutation[$value] : $value;
				$value = ($key == 'contact') ? $array_contact[$value] : $value;
				if($key == 'hotel') {
					$hotel_name = $mw->getRecord($prefix.'hotels', $value, 'id, name');
				}
				$value = ($key == 'hotel') ? $hotel_name['name'] : $value;
				if($key == '1st_choice' && !empty($value)) {
					$escort_name = $mw->getRecord($prefix.'profiles', $value, 'id, nickname');
				}
				$value = ($key == '1st_choice') ? $escort_name['nickname'] : $value;
				$escort_name = '';
				if($key == '1st_alternative' && !empty($value)) {
					$escort_name = $mw->getRecord($prefix.'profiles', $value, 'id, nickname');
				}
				$value = ($key == '1st_alternative') ? $escort_name['nickname'] : $value;
				$escort_name = '';
				if($key == '2nd_alternative' && !empty($value)) {
					$escort_name = $mw->getRecord($prefix.'profiles', $value, 'id, nickname');
				}
				$value = ($key == '2nd_alternative') ? $escort_name['nickname'] : $value;
				$escort_name = '';
				if($key == '2nd_team' && !empty($value)) {
					$escort_name = $mw->getRecord($prefix.'profiles', $value, 'id, nickname');
				}
				$value = ($key == '2nd_team') ? $escort_name['nickname'] : $value;
				$escort_name = '';

				$msg .= '<tr>
					<td width="120" style="vertical-align: top; font-weight: bold;">'.ucwords(str_replace('_', ' ', $key)).':</td>
					<td>'.$value.'</td>
				</tr>';
			}
		}

		$mail_content = '
			Dear DDBE,
			<br /><br />
			You have new booking from '.$xss['first_name'].' '.$xss['last_name'].' see details below:<br /><br />
			<table width="100%" border="0" cellspacing="3" cellpadding="0" style="font-family: arial; font-size: 12px; color: #fff;">
				'.$msg.'
			</table><br />
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

		$mail = '';
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
		$mail->AddAddress($xss['email'], $xss['first_name'].' '.$xss['last_name']);

		$mail->Subject = 'Thank you for your booking request to the ' . $cf->get('siteName') . '';

		$msg = '';
		foreach($xss as $key => $value) {
			if(!in_array($key, array('mode', 'form_id', 'recaptcha_challenge_field', 'recaptcha_response_field'))) {
				$value = ($key == 'service') ? $array_service[$value] : $value;
				$value = ($key == 'duration') ? $array_duration[$value] : $value;
				$value = ($key == 'outfit') ? $array_outfit[$value] : $value;
				$value = ($key == 'special') ? stripcslashes(nl2br($value)) : $value;
				$value = ($key == 'salutation') ? $array_salutation[$value] : $value;
				$value = ($key == 'contact') ? $array_contact[$value] : $value;
				if($key == 'hotel') {
					$hotel_name = $mw->getRecord($prefix.'hotels', $value, 'id, name');
				}
				$value = ($key == 'hotel') ? $hotel_name['name'] : $value;
				if($key == '1st_choice' && !empty($value)) {
					$escort_name = $mw->getRecord($prefix.'profiles', $value, 'id, nickname');
				}
				$value = ($key == '1st_choice') ? $escort_name['nickname'] : $value;
				$escort_name = '';
				if($key == '1st_alternative' && !empty($value)) {
					$escort_name = $mw->getRecord($prefix.'profiles', $value, 'id, nickname');
				}
				$value = ($key == '1st_alternative') ? $escort_name['nickname'] : $value;
				$escort_name = '';
				if($key == '2nd_alternative' && !empty($value)) {
					$escort_name = $mw->getRecord($prefix.'profiles', $value, 'id, nickname');
				}
				$value = ($key == '2nd_alternative') ? $escort_name['nickname'] : $value;
				$escort_name = '';
				if($key == '2nd_team' && !empty($value)) {
					$escort_name = $mw->getRecord($prefix.'profiles', $value, 'id, nickname');
				}
				$value = ($key == '2nd_team') ? $escort_name['nickname'] : $value;
				$escort_name = '';

				$msg .= '<tr>
					<td width="120" style="vertical-align: top; font-weight: bold;">'.ucwords(str_replace('_', ' ', $key)).':</td>
					<td>'.$value.'</td>
				</tr>';
			}
		}

		$mail_content = '
			Dear '.$xss['first_name'].' '.$xss['last_name'].',
			<br />
			<p>Thank you for your booking request to the <?php echo $cf->get('siteName'); ?>. We aim to answer all emails as soon as possible, but please allow 24 hours in which to receive a response. For a same day booking request, you may call us between the hours of 1pm and Midnight Thai time at <strong>'.$sitePhone.'.</strong></p>

			<p>
			    <strong><?php echo $cf->get('siteName'); ?></strong><br />
			    &raquo; <a href="http://www.'.substr($cf->get('mailFrom'), strpos($cf->get('mailFrom'), '@') + 1).'" title="The Devil\'s Den" style="color: #fad902;">www.'.substr($cf->get('mailFrom'), strpos($cf->get('mailFrom'), '@') + 1).'</a>,<br />
			    &raquo; <a href="mailto:'.$cf->get('mailFrom').'" title="'.$cf->get('mailFrom').'" style="color: #fad902;">'.$cf->get('mailFrom').'</a>
			</p>

			<p><strong style="color: #b71300;">This is an automated response from an unmanned mailbox. Please do not reply to this email as it will not be received.</strong></p>

			<p style="color: #777;">Sincerely,<br />
			<strong>'.$cf->get('siteName').'</strong></p>
		';

		$message = $cf->get('mailMessage');
		$message = str_replace('{mail_subject}', $mail->Subject, $message);
		$message = str_replace('{mail_content}', $mail_content, $message);
		$message = str_replace('{dear}', '', $message);
		$message = str_replace('{text}', '', $message);
		$message = str_replace('{fullUrl}', $fullUrl, $message);

		$mail->AltBody = $mail_content;
		$mail->WordWrap = 50;

		$mail->MsgHTML($message);

		if(!$mail->Send()) {
			die('Cannot send email.');
		}

		header('Location: '.$fullUrl.$sysLang.'/thankyou.html');
		die();
	}
?>
