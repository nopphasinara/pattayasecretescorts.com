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
		if(empty($xss['name']) || empty($xss['status'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
		}

		$db->connect();
		$check = $db->select(" select id from ".$prefix."hotels where name = '".$xss['name']."' ");
		$db->close();
		if(!$check) {

		} else {
			$mw->returnError($xss['form_id'], $referer, 'This hotel &quot;'.$xss['name'].'&quot; already exists.');
		}

		$db->connect();
		$insert = $db->command(" insert into ".$prefix."hotels (name, phone_number, address, gps, locked, status, ".$mw->command1.") values ('".$xss['name']."', '".$xss['phone_number']."', '".$xss['address']."', '".$xss['gps']."', '".$xss['locked']."', '".$xss['status']."', ".$mw->command2.") ");
		$db->close();
		if(!$insert) {
			$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
		}

		$mw->returnError('form_delete', $adminUrl.'hotels.php', 'Record saved.', 'text_green');
	}

	# /ADD ############################################

	# EDIT ############################################

	if($xss['mode'] == 'edit') {
		if(empty($xss['name']) || empty($xss['status']) || empty($xss['id']) || empty($xss['old_name'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
		}

		if($xss['name'] != $xss['old_name']) {
			$db->connect();
			$check = $db->select(" select id from ".$prefix."hotels where name = '".$xss['name']."' ");
			$db->close();
			if(!$check) {

			} else {
				$mw->returnError($xss['form_id'], $referer, 'This hotel &quot;'.$xss['name'].'&quot; already exists.');
			}
		}

		$load_id = $xss['id'];

		$mw->saveLog('hotels', $load_id);

		$db->connect();
		$update = $db->command(" update ".$prefix."hotels set name = '".$xss['name']."', phone_number = '".$xss['phone_number']."', address = '".$xss['address']."', gps = '".$xss['gps']."', locked = '".$xss['locked']."', status = '".$xss['status']."', ".$mw->command3." where id = '".$load_id."' ");
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
			$record = $mw->getRecord($prefix.'hotels', $xss['delete'][$i], 'id, name, locked');
			if($record['locked'] == 'yes') {
				$mw->returnError($xss['form_id'], $referer, 'Warning! record name '.$record['name'].' has been locked, please contact administrator.');
			}

			$mw->saveLog('hotels', $xss['delete'][$i], 'delete');
		}

		$mw->returnError($xss['form_id'], $referer, 'Record saved.', 'text_green');
	}

	# /DELETE ############################################
?>