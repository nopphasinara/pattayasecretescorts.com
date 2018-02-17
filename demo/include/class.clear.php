<?php
	# This file create to unset all unused variable
	unset($hxss, $xss, $rxss, $data, $user_data, $_SESSION['form_response'], $_SESSION['response'], $_SESSION['xss'], $_SESSION['rxss'], $_SESSION['hxss'], $_SESSION['form_id']);
	
	ob_end_flush();
?>