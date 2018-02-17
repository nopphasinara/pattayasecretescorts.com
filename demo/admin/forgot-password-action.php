<?php
	$mw->checkHost();	
	$xss = $mw->query($_POST, 'xss');
	
	if(empty($xss['mode'])) {
		die('<script>$(\'#'.$xss['form_id'].' .form_response\').html(\'Error: cannot detect mode.\').show(); document.getElementById(\''.$xss['form_id'].'\').reset();</script>');
	}
	
	if(empty($xss['form_id'])) { die(); }	
	if(empty($xss['email'])) { die(); }
	
	$check_email = $mw->checkEmail(explode(',', $xss['email']));
	if(!$check_email) {
		die('<script>$(\'#'.$xss['form_id'].' .form_response\').html(\'Invalid email address.\').addClass(\'text_red\').show();</script>');
	}
?>