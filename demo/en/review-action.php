<?php
	$mw->checkHost();
	$xss = $mw->query($_POST, 'xss');

    $captcha_query = http_build_query([
      'secret' => '6LcFykUUAAAAALXXUzizQXojrHgzGz4Jo9tjdd3b',
      'response' => $_POST['g-recaptcha-response'],
      'ip' => $_SERVER['REMOTE_ADDR'],
    ]);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify?'. $captcha_query);
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($response) {
      $response = json_decode($response, false);
    }

    // $response->success = 1;

	if (!$response->success) {
        $mw->returnError($xss['form_id'], $referer, 'The reCAPTCHA wasn&#39;t entered correctly. Go back and try it again.');
		// $mw->phpAjax($xss['form_id'], 'The reCAPTCHA wasn&#39;t entered correctly. Go back and try it again.', 'no', 'no');
	} else {
		if(empty($xss['name']) || empty($xss['email']) || empty($xss['rate']) || empty($xss['text']) || empty($xss['profile_id'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
		}

		$check_email = $mw->checkEmail(array($xss['email']));
		if(!$check_email) {
			$mw->returnError($xss['form_id'], $referer, 'Invalid email address, please try again.');
		}

		$db->report = true;
		$db->connect();
		$insert = $db->command(" insert into ".$prefix."reviews (profile_id, name, email, text, rate, recaptcha, locked, _read, status, date_time, update_time, ip, user_agent, update_ip, update_user_agent) values ('".$xss['profile_id']."', '".$xss['name']."', '".$xss['email']."', '".nl2br($xss['text'])."', '".$xss['rate']."', '".$xss['recaptcha_response_field']."', 'no', 'no', 'disabled', '".$requestDateTime."', '".$requestDateTime."', '".$clientIp."', '".$userAgent."', '".$clientIp."', '".$userAgent."') ");
		$db->close();
		if(!$insert) {
			$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
		} else {
			$db->connect();
			$db->command(" update ".$prefix."profiles set _review = _review + 1 where id = '".$xss['profile_id']."' ");
			$db->close();

			$mw->returnError($xss['form_id'], $referer, 'Thank you for submitting your informations.', 'text-success');
		}
	}
?>
