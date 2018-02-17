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
	$xss['offers'] = strtolower($xss['offers']);
	$xss['offers'] = (empty($xss['offers']) || $xss['offers'] != 'yes') ? 'no' : 'yes';
	$xss['receives'] = strtolower($xss['receives']);
	$xss['receives'] = (empty($xss['receives']) || $xss['receives'] != 'yes') ? 'no' : 'yes';
	
	$more_command1 = '';
	$more_command2 = '';
	$more_command3 = '';
	foreach($languageSet as $key => $value) {
		$xss['name_'.$value.''] = (empty($xss['name_'.$value.''])) ? $xss['name_'.$sysLang.''] : $xss['name_'.$value.''];
		$more_command1 .= " name_".$value.", ";
		$more_command2 .= " '".$xss['name_'.$value.'']."', ";
		$more_command3 .= " name_".$value." = '".$xss['name_'.$value.'']."', ";
	}
	
	# ADD ############################################
	
	if($xss['mode'] == 'add') {
		if(empty($xss['name_'.$sysLang.'']) || (empty($xss['offers']) && empty($xss['receives'])) || empty($xss['status'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
		}
		
		$db->connect();
		$insert = $db->command(" insert into ".$prefix."services (".$more_command1." offers, receives, locked, status, ".$mw->command1.") values (".$more_command2." '".$xss['offers']."', '".$xss['receives']."', '".$xss['locked']."', '".$xss['status']."', ".$mw->command2.") ");
		$db->close();
		if(!$insert) {
			$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
		}
		
		$mw->returnError('form_delete', $adminUrl.'services.php', 'Record saved.', 'text_green');
	}
	
	# /ADD ############################################
	
	# EDIT ############################################
	
	if($xss['mode'] == 'edit') {
		if(empty($xss['name_'.$sysLang.'']) || (empty($xss['offers']) && empty($xss['receives'])) || empty($xss['status']) || empty($xss['id'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
		}
		
		$mw->saveLog("services", $xss['id']);
		
		$db->connect();
		$update = $db->command(" update ".$prefix."services set ".$more_command3." offers = '".$xss['offers']."', receives = '".$xss['receives']."', locked = '".$xss['locked']."', status = '".$xss['status']."', ".$mw->command3." where id = '".$xss['id']."' ");
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
			$record = $mw->getRecord($prefix.'services', $xss['delete'][$i], 'id, name_'.$sysLang.', locked');
			if($record['locked'] == 'yes') {
				$mw->returnError($xss['form_id'], $referer, 'Warning! record name '.$record['name_'.$sysLang.''].' has been locked, please contact administrator.');
			}
			
			$mw->saveLog('services', $xss['delete'][$i], 'delete');
		}
			
		$mw->returnError($xss['form_id'], $referer, 'Record deleted.', 'text_green');
	}
	
	# /DELETE ############################################
?>