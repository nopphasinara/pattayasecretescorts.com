<?php
	require('../include/admin.php');
	
	$mw->checkHost();
	
	$user_data = $mw->checkLogin(array('admin'));
	
	# Generate $_POST and/or $_GET variables
	$xss = $mw->query($_POST, 'xss');
	
	# Detect form submit mode and id
	if(empty($xss['mode']) || empty($xss['form_id'])) {
		die('Warning! system stop working due to invalid config.');
	}
	
	# Reset variables
	$xss['locked'] = strtolower($xss['locked']);
	$xss['locked'] = (empty($xss['locked']) || $xss['locked'] != 'yes') ? 'no' : 'yes';
	
	# ADD ############################################
	
	if($xss['mode'] == 'add') {
		if(empty($xss['name']) || empty($xss['email']) || empty($xss['password']) || empty($xss['confirm_password']) || empty($xss['level']) || empty($xss['status'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
		}
		
		if(!$mw->checkBlacklist($xss['name'])) {
			$mw->returnError($xss['form_id'], $referer, 'Cannot use &quot;'.$xss['name'].'&quot; on this system.');
		}
		
		if(!$mw->checkBlacklist($xss['email'])) {
			$mw->returnError($xss['form_id'], $referer, 'Cannot use &quot;'.$xss['email'].'&quot; on this system.');
		}
		
		$check_email = $mw->checkEmail(array($xss['email']));
		if(!$check_email) {
			$mw->returnError($xss['form_id'], $referer, 'Invalid email address, please try again.');
		}
		
		$db->connect();
		$check_data = $db->select(" select id from ".$prefix."users where email = '".$xss['email']."' ");
		$db->close();
		if($check_data) {
			$mw->returnError($xss['form_id'], $referer, 'This email already exists, please try another email.');
		}
		
		if($xss['password'] != $xss['confirm_password']) {
			$mw->returnError($xss['form_id'], $referer, 'Confirm password doesn&#39;t match.');
		}
		
		if(strlen($xss['password']) < 5 || strlen($xss['confirm_password']) < 5) {
			$mw->returnError($xss['form_id'], $referer, 'Minimum password should be at least 5 characters length.');
		}
		
		$hash_password = $ph->hashPassword($xss['password']);
		
		$db->connect();
		$insert = $db->command(" insert into ".$prefix."users (email, hash, salt, name, level, locked, status, ".$mw->command1.") values ('".$xss['email']."', '".$hash_password['hash']."', '".$hash_password['salt']."', '".$xss['name']."', '".$xss['level']."', '".$xss['locked']."', '".$xss['status']."', ".$mw->command2.") ");
		$db->close();
		if(!$insert) {
			$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
		}
		
		$mw->returnError('form_delete', $adminUrl.'users.php', 'Record saved.', 'text_green');
	}
	
	# /ADD ############################################
	
	# EDIT ############################################
	
	if($xss['mode'] == 'edit') {
		if(empty($xss['name']) || empty($xss['email']) || empty($xss['level']) || empty($xss['status']) || empty($xss['id']) || empty($xss['old_email']) || empty($xss['old_name'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
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
			$check_data = $db->select(" select id from ".$prefix."users where email = '".$xss['email']."' and id != '".$xss['id']."' ");
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
			$update = $db->command(" update ".$prefix."users set hash = '".$hash_password['hash']."', salt = '".$hash_password['salt']."' where id = '".$xss['id']."' ");
			$db->close();
			if(!$update) {
				$mw->returnError($xss['form_id'], $referer, 'Cannot update password, please try again.');
			}
		}
		
		$mw->saveLog("users", $xss['id']);
		
		$db->connect();
		$update = $db->command(" update ".$prefix."users set email = '".$xss['email']."', name = '".$xss['name']."', level = '".$xss['level']."', locked = '".$xss['locked']."', status = '".$xss['status']."', ".$mw->command3." where id = '".$xss['id']."' ");
		$db->close();
		if(!$update) {
			$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
		}
		
		$mw->returnError('form_delete', $_POST['referer'], 'Record saved.', 'text_green');
	}
	
	# /EDIT ############################################
	
	# DELETE ############################################
	
	if($xss['mode'] == 'delete') {
		if(empty($xss['delete']) || !is_array($xss['delete'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please select records.');
		}
		
		$total_item = count($xss['delete']);
		for($i = 0; $i < $total_item; $i++) {
			$record = $mw->getRecord($prefix.'users', $xss['delete'][$i], 'id, name');
			if($record['locked'] == 'yes') {
				$mw->returnError($xss['form_id'], $referer, 'Warning! record name '.$record['name'].' has been locked, please contact administrator.');
			}
			
			$mw->saveLog("users", $xss['delete'][$i], 'delete');
		}
			
		$mw->returnError($xss['form_id'], $referer, 'Record deleted.', 'text_green');
	}
	
	# /DELETE ############################################
?>