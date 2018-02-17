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
	$xss['_blank'] = strtolower($xss['_blank']);
	$xss['_blank'] = (empty($xss['_blank']) || $xss['_blank'] != 'yes') ? 'no' : 'yes';
	$xss['color'] = preg_replace('/[^0-9a-zA-Z\#]/i', '', strtolower($xss['color']));
	
	$more_command1 = '';
	$more_command2 = '';
	$more_command3 = '';
	foreach($languageSet as $key => $value) {
		$xss['name_'.$value.''] = (empty($xss['name_'.$value.''])) ? $xss['name_'.$sysLang.''] : $xss['name_'.$value.''];
		$more_command1 .= " name_".$value.", ";
		$more_command2 .= " '".nl2br($xss['name_'.$value.''])."', ";
		$more_command3 .= " name_".$value." = '".nl2br($xss['name_'.$value.''])."', ";
	}
	
	# ADD ############################################
	
	if($xss['mode'] == 'add') {
		if(empty($xss['name_'.$sysLang.'']) || empty($xss['status'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
		}
		
		$db->connect();
		$insert = $db->command(" insert into ".$prefix."scrolling_texts (".$more_command1." link, color, _blank, locked, status, ".$mw->command1.") values (".$more_command2." '".$xss['link']."', '".$xss['color']."', '".$xss['_blank']."', '".$xss['locked']."', '".$xss['status']."', ".$mw->command2.") ");
		$db->close();
		if(!$insert) {
			$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
		}
		
		$mw->returnError('form_delete', $adminUrl.'scrolling-texts.php', 'Record saved.', 'text_green');
	}
	
	# /ADD ############################################
	
	# EDIT ############################################
	
	if($xss['mode'] == 'edit') {
		if(empty($xss['name_'.$sysLang.'']) || empty($xss['status']) || empty($xss['id'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
		}
		
		$load_id = $xss['id'];
		
		$mw->saveLog('scrolling_texts', $load_id);
		
		$db->connect();
		$update = $db->command(" update ".$prefix."scrolling_texts set ".$more_command3." link = '".$xss['link']."', color = '".$xss['color']."', _blank = '".$xss['_blank']."', locked = '".$xss['locked']."', status = '".$xss['status']."', ".$mw->command3." where id = '".$load_id."' ");
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
			$record = $mw->getRecord($prefix.'scrolling_texts', $xss['delete'][$i], 'id, name_'.$sysLang.', locked');
			if($record['locked'] == 'yes') {
				$mw->returnError($xss['form_id'], $referer, 'Warning! record name '.$record['name_'.$sysLang.''].' has been locked, please contact administrator.');
			}
			
			$mw->saveLog('scrolling_texts', $xss['delete'][$i], 'delete');
		}
			
		$mw->returnError($xss['form_id'], $referer, 'Record saved.', 'text_green');
	}
	
	# /DELETE ############################################
	
	# ORDER ############################################
	
	if($xss['mode'] == 'order') {
		if(empty($xss['log_id'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please select records.');
		}
		
		$total_item = count($xss['log_id']);
		for($i = 0; $i < $total_item; $i++) {
			$db->connect();
			$update = $db->command(" update ".$prefix."scrolling_texts set _order = '".$i."' where id = '".$xss['log_id'][$i]."' ");
			$db->close();
			if(!$update) {
				$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
			}
		}
		
		$mw->returnError($xss['form_id'], $referer, 'Record saved.', 'text_green');
	}
	
	# /ORDER ############################################
?>