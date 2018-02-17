<?php
	$mw->checkHost();	
	$xss = $mw->query($_POST, 'xss');
	
	setcookie('_uid', '', time() - 3600, $basePath);
	setcookie('_ig', '', time() - 3600, $basePath);
	setcookie('_rnd', '', time() - 3600, $basePath);
	
	if(empty($xss['mode'])) {
		die('<script>$(\'#'.$xss['form_id'].' .form_response\').html(\'Error: cannot detect mode.\').show(); document.getElementById(\''.$xss['form_id'].'\').reset();</script>');
	}
	
	if(empty($xss['form_id'])) { die(); }	
	if(empty($xss['email']) || empty($xss['password'])) { die(); }
	
	$check_email = $mw->checkEmail(explode(',', $xss['email']));
	if(!$check_email) {
		die('<script>$(\'#'.$xss['form_id'].' .form_response\').html(\'Invalid email address.\').addClass(\'text_red\').show(); $(\'input[name="password"]\').attr(\'value\', \'\');</script>');
	}
	
	$db->connect();
	$data = $db->select(" select id, hash, status from ".$prefix."users where email = '".$xss['email']."' ");
	$db->close();
	if(!$data) {
		die('<script>$(\'#'.$xss['form_id'].' .form_response\').html(\'This email address doesn&#39;t exists.\').addClass(\'text_red\').show(); $(\'input[name="password"]\').attr(\'value\', \'\');</script>');
	}
	
	$data = $data['0'];
	
	if(crypt($xss['password'], $data['hash']) != $data['hash']) {
		die('<script>$(\'#'.$xss['form_id'].' .form_response\').html(\'Invalid password.\').addClass(\'text_red\').show(); $(\'input[name="password"]\').attr(\'value\', \'\');</script>');
	}
	
	if($data['status'] != 'enable') {
		die('<script>$(\'#'.$xss['form_id'].' .form_response\').html(\'This account has been disabled.\').addClass(\'text_red\').show(); $(\'input[name="password"]\').attr(\'value\', \'\');</script>');
	}
	
	$db->connect();
	$db->command(" update ".$prefix."users set sessionid = '".SESSIONID."' where id = '".$data['id']."' ");
	$db->close();
	
	$cookie = $mw->createVar($data['hash'], $data['id']);
	
	setcookie('_uid', $cookie['_uid'], 0, $basePath);
	setcookie('_ig', $cookie['_ig'], 0, $basePath);
	setcookie('_rnd', $cookie['_rnd'], 0, $basePath);
	
	die('<script>window.location = \''.$adminUrl.'dashboard\';</script>');
?>