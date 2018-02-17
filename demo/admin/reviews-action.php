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
		if(empty($xss['name']) || empty($xss['text']) || empty($xss['rate']) || empty($xss['profile_id']) || empty($xss['status'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
		}
		
		if(!empty($xss['email'])) {
			$check_email = $mw->checkEmail(array($xss['email']));
			if(!$check_email) {
				$mw->returnError($xss['form_id'], $referer, 'Invalid email address, please try again.');
			}
		}
		
		$db->connect();
		$insert = $db->command(" insert into ".$prefix."reviews (profile_id, name, email, text, rate, _read, locked, status, ".$mw->command1.") values ('".$xss['profile_id']."', '".$xss['name']."', '".$xss['email']."', '".nl2br($xss['text'])."', '".$xss['rate']."', 'yes', '".$xss['locked']."', '".$xss['status']."', ".$mw->command2.") ");
		$db->close();
		if(!$insert) {
			$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
		}
		
		$mw->returnError('form_delete', $adminUrl.'reviews.php', 'Record saved.', 'text_green');
	}
	
	# /ADD ############################################
	
	# EDIT ############################################
	
	if($xss['mode'] == 'edit') {
		if(empty($xss['name']) || empty($xss['text']) || empty($xss['rate']) || empty($xss['profile_id']) || empty($xss['status']) || empty($xss['id'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
		}
		
		if(!empty($xss['email'])) {
			$check_email = $mw->checkEmail(array($xss['email']));
			if(!$check_email) {
				$mw->returnError($xss['form_id'], $referer, 'Invalid email address, please try again.');
			}
		}
		
		$db->report = true;
		
		$load_id = $xss['id'];
		
		$mw->saveLog('reviews', $load_id);
		
		$db->connect();
		$update = $db->command(" update ".$prefix."reviews set profile_id = '".$xss['profile_id']."', name = '".$xss['name']."', email = '".$xss['email']."', text = '".nl2br($xss['text'])."', rate = '".$xss['rate']."', locked = '".$xss['locked']."', status = '".$xss['status']."', ".$mw->command3." where id = '".$load_id."' ");
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
			$record = $mw->getRecord($prefix.'reviews', $xss['delete'][$i], 'id, name, locked');
			if($record['locked'] == 'yes') {
				$mw->returnError($xss['form_id'], $referer, 'Warning! record name '.$record['name'].' has been locked, please contact administrator.');
			}
			
			$mw->saveLog('reviews', $xss['delete'][$i], 'delete');
		}
			
		$mw->returnError($xss['form_id'], $referer, 'Record saved.', 'text_green');
	}
	
	# /DELETE ############################################
?>