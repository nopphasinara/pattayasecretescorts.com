<?php
	$mw->checkHost();
	$user_data = $mw->checkLogin(array('admin'));
	
	# Generate $_POST and/or $_GET variables
	if($method == 'get') {
		$xss = $mw->query($_GET, 'xss');
	} else if($method == 'post') {
		$xss = $mw->query($_POST, 'xss');
	}
	
	# Detect form submit mode and id
	if(empty($xss['mode']) || empty($xss['form_id'])) {
		$mw->phpAjax($xss['form_id'], 'Error: form structure is invalid.');
	}
	
	# Reset variables
	$xss['locked'] = strtolower($xss['locked']);
	$xss['locked'] = (empty($xss['locked']) || $xss['locked'] != 'yes') ? 'no' : 'yes';
	
	# ADD ############################################
	
	if($xss['mode'] == 'add') {
		if(empty($xss['name']) || empty($xss['email']) || empty($xss['password']) || empty($xss['confirm_password']) || empty($xss['level']) || empty($xss['status'])) {
			$mw->phpAjax($xss['form_id'], 'Please complete all required fields.');
		}
		
		$mw->checkBlacklist($xss['name'], $xss['form_id']);
		$mw->checkBlacklist($xss['email'], $xss['form_id']);
		
		$check_email = $mw->checkEmail(array($xss['email']));
		if(!$check_email) {
			$mw->phpAjax($xss['form_id'], 'Invalid email address, please try again.');
		}
		
		$db->connect();
		$check_data = $db->select(" select id from ".$prefix."users where email = '".$xss['email']."' ");
		$db->close();
		if($check_data) {
			$mw->phpAjax($xss['form_id'], 'This email already exists, please try another email.');
		}
		
		if($xss['password'] != $xss['confirm_password']) {
			$mw->phpAjax($xss['form_id'], 'Confirm password doesn&#39;t match.');
		}
		
		if(strlen($xss['password']) < 5 || strlen($xss['confirm_password']) < 5) {
			$mw->phpAjax($xss['form_id'], 'Minimum password should be at least 5 characters length.');
		}
		
		$hash_password = $ph->hashPassword($xss['password']);
		
		$db->connect();
		$insert = $db->command(" insert into ".$prefix."users (email, hash, salt, name, level, locked, status, ".$mw->command1.") values ('".$xss['email']."', '".$hash_password['hash']."', '".$hash_password['salt']."', '".$xss['name']."', '".$xss['level']."', '".$xss['locked']."', '".$xss['status']."', ".$mw->command2.") ");
		$db->close();
		if(!$insert) {
			$mw->phpAjax($xss['form_id'], 'Cannot save record, please try again.');
		}
		
		$_SESSION['form_response'] = 'Your record has been saved.';
		die('<script>window.location = \''.$adminUrl.'users&form_id='.$xss['form_id'].'&response=text_green\';</script>');
	}
	
	# /ADD ############################################
	
	# EDIT ############################################
	
	if($xss['mode'] == 'edit') {
		if(empty($xss['name']) || empty($xss['email']) || empty($xss['level']) || empty($xss['status']) || empty($xss['id']) || empty($xss['old_email']) || empty($xss['old_name'])) {
			$mw->phpAjax($xss['form_id'], 'Please complete all required fields.');
		}
		
		if($xss['name'] != $xss['old_name']) {
			$mw->checkBlacklist($xss['name'], $xss['form_id']);
		}
		
		if($xss['email'] != $xss['old_email']) {
			$mw->checkBlacklist($xss['email'], $xss['form_id']);
		}
		
		$check_email = $mw->checkEmail(array($xss['email']));
		if(!$check_email) {
			$mw->phpAjax($xss['form_id'], 'Invalid email address, please try again.');
		}
		
		if($xss['email'] != $xss['old_email']) {
			$db->connect();
			$check_data = $db->select(" select id from ".$prefix."users where email = '".$xss['email']."' and id != '".$xss['id']."' ");
			$db->close();
			if($check_data) {
				$mw->phpAjax($xss['form_id'], 'This email already exists, please try another email.');
			}
		}
		
		if(!empty($xss['password']) || !empty($xss['confirm_password'])) {
			if($xss['password'] != $xss['confirm_password']) {
				$mw->phpAjax($xss['form_id'], 'Confirm password doesn&#39;t match.');
			}

			if(strlen($xss['password']) < 5 || strlen($xss['confirm_password']) < 5) {
				$mw->phpAjax($xss['form_id'], 'Minimum password should be at least 5 characters length.');
			}

			$hash_password = $ph->hashPassword($xss['password']);
			
			$db->connect();
			$update = $db->command(" update ".$prefix."users set hash = '".$hash_password['hash']."', salt = '".$hash_password['salt']."' where id = '".$xss['id']."' ");
			$db->close();
			if(!$update) {
				$mw->phpAjax($xss['form_id'], 'Cannot update your password, please try again.');
			}
		}
		
		$db->connect();
		$insert = $db->command(" insert into ".$prefix."users_log (id, email, hash, salt, name, level, locked, status, ".$mw->command1.") select * from ".$prefix."users where id = '".$xss['id']."' ");
		$db->close();
		if(!$insert) {
			$mw->phpAjax($xss['form_id'], 'Cannot save log file, please try again.');
		}
		
		$db->connect();
		$update = $db->command(" update ".$prefix."users set email = '".$xss['email']."', name = '".$xss['name']."', level = '".$xss['level']."', locked = '".$xss['locked']."', status = '".$xss['status']."', ".$mw->command3." where id = '".$xss['id']."' ");
		$db->close();
		if(!$update) {
			$mw->phpAjax($xss['form_id'], 'Cannot save your record, please try again.');
		}
		
		$_SESSION['form_response'] = 'Your record has been saved.';
		die('<script>window.location = \''.urldecode($xss['referer']).'&form_id=form_default&response=text_green\';</script>');
	}
	
	# /EDIT ############################################
	
	# DELETE ############################################
	
	if($xss['mode'] == 'delete') {
		if(empty($xss['delete']) || !is_array($xss['delete'])) {
			$mw->phpAjax($xss['form_id'], 'Please select record to delete.');
		}
		
		$total_item = count($xss['delete']);
		for($i = 0; $i < $total_item; $i++) {
			$db->connect();
			$check_locked = $db->select(" select name, locked from ".$prefix."users where id = '".$xss['delete'][$i]."' ");
			$db->close();
			if(!$check_locked) {
				$mw->phpAjax($xss['form_id'], 'Cannot load locked datas.');
			}
			
			$check_locked = $check_locked['0'];
			
			if(strtolower($check_locked['locked']) == 'yes') {
				$mw->phpAjax($xss['form_id'], 'Error! record name '.$check_locked['name'].' has been locked, this record cannot delete.');
			}
			
			$db->connect();
			$db->command(" update ".$prefix."users set status = 'deleted', ".$mw->command3." where id = '".$xss['delete'][$i]."' ");
			$db->command(" insert into ".$prefix."users_log (id, email, hash, salt, name, level, locked, status, ".$mw->command1.") select * from ".$prefix."users where id = '".$xss['delete'][$i]."' ");
			$db->command(" delete from ".$prefix."users where id = '".$xss['delete'][$i]."' ");
			$db->close();
		}
			
		$_SESSION['form_response'] = 'Records Deleted.';
		die('<script>window.location = \''.urldecode($referer).'&form_id=form_delete&response=text_green\';</script>');
	}
	
	# /DELETE ############################################
?>