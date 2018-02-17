<?php
	require('../include/admin.php');
	
	$mw->checkHost();
	$user_data = $mw->checkLogin();
	
	# Generate $_POST and/or $_GET variables
	$xss = $mw->query($_POST, 'xss');
	
	# Detect form submit mode and id
	if(empty($xss['mode']) || empty($xss['form_id'])) {
		die('Warning! system stop working due to invalid config.');
	}
	
	# Reset variables
	
	# EDIT ############################################
	
	if($xss['mode'] == 'edit') {
		if(empty($xss['name']) || empty($xss['email']) || empty($xss['old_email']) || empty($xss['old_name']) || empty($xss['current_password'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
		}
		
		$check_password = $ph->hashCheck($user_data['hash'], $user_data['salt'], $xss['current_password']);
		if(!$check_password) {
			$mw->returnError($xss['form_id'], $referer, 'Your current password doesn&#39;t match.');
		}
		
		if($xss['name'] != $xss['old_name']) {
			if(!$mw->checkBlacklist($xss['name'])) {
				$mw->returnError($xss['form_id'], $referer, 'Cannot use &quot;'.$xss['name'].'&quot; on this system.');
			}
		}
		
		if($xss['email'] != $xss['old_email']) {
			if(!$mw->checkBlacklist($xss['email'])) {
				$mw->returnError($xss['form_id'], $referer, 'Cannot use &quot;'.$xss['email'].'&quot; on this system.');
			}
		}
		
		$check_email = $mw->checkEmail(array($xss['email']));
		if(!$check_email) {
			$mw->returnError($xss['form_id'], $referer, 'Invalid email address, please try again.');
		}
		
		if($xss['email'] != $xss['old_email']) {
			$db->connect();
			$check_data = $db->select(" select id from ".$prefix."users where email = '".$xss['email']."' and id != '".$user_data['id']."' ");
			$db->close();
			if($check_data) {
				$mw->returnError($xss['form_id'], $referer, 'This email already exists, please try another email.');
			}
		}
		
		if(!empty($xss['password']) || !empty($xss['confirm_password'])) {
			if($xss['password'] != $xss['confirm_password']) {
				$mw->returnError($xss['form_id'], $referer, 'Confirm password doesn&#39;t match.');
			}

			if(strlen($xss['password']) < 5 || strlen($xss['confirm_password']) < 5) {
				$mw->returnError($xss['form_id'], $referer, 'Minimum password should be at least 5 characters length.');
			}

			$hash_password = $ph->hashPassword($xss['password']);
			
			$db->connect();
			$update = $db->command(" update ".$prefix."users set hash = '".$hash_password['hash']."', salt = '".$hash_password['salt']."' where id = '".$user_data['id']."' ");
			$db->close();
			if(!$update) {
				$mw->returnError($xss['form_id'], $referer, 'Cannot update password, please try again.');
			}
		}
		
		$mw->saveLog("users", $user_data['id']);
		
		$db->connect();
		$update = $db->command(" update ".$prefix."users set email = '".$xss['email']."', name = '".$xss['name']."', ".$mw->command3." where id = '".$user_data['id']."' ");
		$db->close();
		if(!$update) {
			$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
		}
		
		$mw->returnError($xss['form_id'], $referer, 'Record saved.', 'text_green');
	}
	
	# /EDIT ############################################
?>