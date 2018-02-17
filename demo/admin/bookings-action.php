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
		if(empty($xss['service']) || (empty($xss['1st_choice']) && empty($xss['1st_alternative']) && empty($xss['2nd_alternative']) && empty($xss['2nd_team'])) || empty($xss['date']) || empty($xss['salutation']) || empty($xss['first_name']) || empty($xss['last_name']) || empty($xss['email']) || empty($xss['phone_number']) || empty($xss['hotel']) || empty($xss['room_number']) || empty($xss['contact']) || empty($xss['status'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
		}

		$check_email = $mw->checkEmail(array($xss['email']));
		if(!$check_email) {
			$mw->returnError($xss['form_id'], $referer, 'Invalid email address, please try again.');
		}

		$refno = 'DDBE-'.date('Ymd-', $requestTime).substr(preg_replace('/[^0-9]/i', '', SESSIONID), 0, 6);
		
		$db->connect();
		$insert = $db->command(" insert into ".$prefix."bookings (refno, service, 1st_choice, 1st_alternative, 2nd_alternative, 2nd_team, date, hour, min, duration, outfit, special, salutation, first_name, last_name, email, phone_number, hotel, room_number, address, contact, locked, status, ".$mw->command1.") values ('".$refno."', '".$xss['service']."', '".$xss['1st_choice']."', '".$xss['1st_alternative']."', '".$xss['2nd_alternative']."', '".$xss['2nd_team']."', '".$xss['date']."', '".$xss['hour']."', '".$xss['min']."', '".$xss['duration']."', '".$xss['outfit']."', '".nl2br($xss['special'])."', '".$xss['salutation']."', '".$xss['first_name']."', '".$xss['last_name']."', '".$xss['email']."', '".$xss['phone_number']."', '".$xss['hotel']."', '".$xss['room_number']."', '".$xss['address']."', '".$xss['contact']."', '".$xss['locked']."', '".$xss['status']."', ".$mw->command2.") ");
		$db->close();
		if(!$insert) {
			$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
		}
		
		$db->connect();
		foreach($array_escort_title as $key => $value) {
			$db->command(" update ".$prefix."profiles set _booking = _booking + 1 where id = '".$xss[$key]."' ");
		}
		$db->close();

		$mw->returnError('form_delete', $adminUrl.'bookings.php', 'Record saved.', 'text_green');
	}
	
	# /ADD ############################################
	
	# EDIT ############################################
	
	if($xss['mode'] == 'edit') {
		if(empty($xss['service']) || (empty($xss['1st_choice']) && empty($xss['1st_alternative']) && empty($xss['2nd_alternative']) && empty($xss['2nd_team'])) || empty($xss['date']) || empty($xss['salutation']) || empty($xss['first_name']) || empty($xss['last_name']) || empty($xss['email']) || empty($xss['phone_number']) || empty($xss['hotel']) || empty($xss['room_number']) || empty($xss['contact']) || empty($xss['status']) || empty($xss['id'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
		}
		
		$check_email = $mw->checkEmail(array($xss['email']));
		if(!$check_email) {
			$mw->returnError($xss['form_id'], $referer, 'Invalid email address, please try again.');
		}
		
		$load_id = $xss['id'];
		
		$mw->saveLog('bookings', $load_id);
		
		$db->connect();
		$update = $db->command(" update ".$prefix."bookings set service = '".$xss['service']."', 1st_choice = '".$xss['1st_choice']."', 1st_alternative = '".$xss['1st_alternative']."', 2nd_alternative = '".$xss['2nd_alternative']."', 2nd_team = '".$xss['2nd_team']."', date = '".$xss['date']."', hour = '".$xss['hour']."', min = '".$xss['min']."', duration = '".$xss['duration']."', outfit = '".$xss['outfit']."', special = '".nl2br($xss['special'])."', salutation = '".$xss['salutation']."', first_name = '".$xss['first_name']."', last_name = '".$xss['last_name']."', email = '".$xss['email']."', phone_number = '".$xss['phone_number']."', hotel = '".$xss['hotel']."', room_number = '".$xss['room_number']."', address = '".$xss['address']."', contact = '".$xss['contact']."', locked = '".$xss['locked']."', status = '".$xss['status']."', ".$mw->command3." where id = '".$load_id."' ");
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
			$record = $mw->getRecord($prefix.'bookings', $xss['delete'][$i], 'id, refno, locked');
			if($record['locked'] == 'yes') {
				$mw->returnError($xss['form_id'], $referer, 'Warning! record refno '.$record['refno'].' has been locked, please contact administrator.');
			}
			
			$mw->saveLog('bookings', $xss['delete'][$i], 'delete');
		}
			
		$mw->returnError($xss['form_id'], $referer, 'Record saved.', 'text_green');
	}
	
	# /DELETE ############################################
?>