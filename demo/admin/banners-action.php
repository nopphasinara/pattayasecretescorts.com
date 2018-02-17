<?php
	//ini_set('max_execution_time', 0);
	//ini_set('memory_limit', 128);

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

	# UPLOAD ############################################

	$save_name = '';

	if($xss['banner_type'] == 'image') {
		if(empty($_FILES['file']['tmp_name'])) {
			if($xss['mode'] == 'add') {
				$mw->returnError($xss['form_id'], $referer, 'Please upload banner image.');
			} else if($xss['mode'] == 'edit') {
				if(empty($xss['old_file'])) {
					$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
				}

				$save_name = $xss['old_file'];
			}
		} else {
			require('../include/class.image.php');

			$upload_report = '';
			$limit = 3000000;
			$file = $_FILES['file']['tmp_name'];
			$file_name = $_FILES['file']['name'];
			$file_info = $img->imageInfo($file);

			if($file_info['size'] >= $limit) {
				$mw->returnError($xss['form_id'], $referer, 'Failed: file name '.$file_name.' is larger than '.($limit / 1000000).'MB.');
			} else if($file_info['width'] <= 0 || $file_info['height'] <= 0 || !in_array($file_info['ext'], $imageSet)) {
				$mw->returnError($xss['form_id'], $referer, 'Failed: file name '.$file_name.' invalid type.');
			} else {
				$tmp_name = md5($file);
				$save_name = time().'_'.mt_rand().'_'.$tmp_name.'.'.$file_info['ext'];

				$upload = @copy($file, $bannerPath.$tmp_name);
				if(!$upload) {
					$mw->returnError($xss['form_id'], $referer, 'Failed: file name '.$file_name.' cannot upload.');
				} else {
					$resize_to = ($file_info['width'] < 150) ? $file_info['width'] : 150;
					$img->resize($bannerPath.$tmp_name, $resize_to, 0, true, $bannerPath.$save_name, true, false);
					@unlink($bannerPath.$xss['old_file']);
				}
			}
		}
	}

	# /UPLOAD ############################################

	# ADD ############################################

	if($xss['mode'] == 'add') {
		if(empty($xss['name']) || empty($xss['banner_type']) || empty($xss['banner_side']) || empty($xss['status'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
		}

		$db->connect();
		$insert = $db->command(" insert into ".$prefix."banners (name, file_name, banner_side, banner_type, link, _blank, locked, status, ".$mw->command1.") values ('".$xss['name']."', '".$save_name."', '".$xss['banner_side']."', '".$xss['banner_type']."', '".$xss['link']."', '".$xss['_blank']."', '".$xss['locked']."', '".$xss['status']."', ".$mw->command2.") ");
		$db->close();
		if(!$insert) {
			$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
		}

		$mw->returnError('form_delete', $adminUrl.'banners.php', 'Record saved.', 'text_green');
	}

	# /ADD ############################################

	# EDIT ############################################

	if($xss['mode'] == 'edit') {
		if(empty($xss['name']) || empty($xss['banner_type']) || empty($xss['banner_side']) || empty($xss['status']) || empty($xss['id'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
		}

		$load_id = $xss['id'];

		$mw->saveLog('banners', $load_id);

		$db->connect();
		$update = $db->command(" update ".$prefix."banners set name = '".$xss['name']."', file_name = '".$save_name."', banner_side = '".$xss['banner_side']."', banner_type = '".$xss['banner_type']."', link = '".$xss['link']."', _blank = '".$xss['_blank']."', locked = '".$xss['locked']."', status = '".$xss['status']."', ".$mw->command3." where id = '".$load_id."' ");
		$db->close();
		if(!$update) {
			$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
		}

		if($xss['banner_type'] != 'image') {
			@unlink($bannerPath.$xss['old_file']);
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
			$record = $mw->getRecord($prefix.'banners', $xss['delete'][$i], 'id, name, file_name, locked');
			if($record['locked'] == 'yes') {
				$mw->returnError($xss['form_id'], $referer, 'Warning! record name '.$record['name'].' has been locked, please contact administrator.');
			}

			$mw->saveLog('banners', $xss['delete'][$i], 'delete');

			@unlink($bannerPath.$record['file_name']);
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
			$update = $db->command(" update ".$prefix."banners set _order = '".$i."' where id = '".$xss['log_id'][$i]."' ");
			$db->close();
			if(!$update) {
				$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
			}
		}

		$mw->returnError($xss['form_id'], $referer, 'Record saved.', 'text_green');
	}

	# /ORDER ############################################
?>