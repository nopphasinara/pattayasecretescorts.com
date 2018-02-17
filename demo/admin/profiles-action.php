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
	$xss['_new'] = strtolower($xss['_new']);
	$xss['_new'] = (empty($xss['_new']) || $xss['_new'] != 'yes') ? 'no' : 'yes';
	$xss['_hot'] = strtolower($xss['_hot']);
	$xss['_hot'] = (empty($xss['_hot']) || $xss['_hot'] != 'yes') ? 'no' : 'yes';
	$xss['show_video'] = strtolower($xss['show_video']);
	$xss['show_video'] = (empty($xss['show_video']) || $xss['show_video'] != 'yes') ? 'no' : 'yes';
	
	$more_command1 = '';
	$more_command2 = '';
	$more_command3 = '';
	foreach($languageSet as $key => $value) {
		$xss['detail_'.$value.''] = (empty($xss['detail_'.$value.''])) ? $xss['detail_'.$sysLang.''] : $xss['detail_'.$value.''];
		$more_command1 .= " detail_".$value.", ";
		$more_command2 .= " '".nl2br($xss['detail_'.$value.''])."', ";
		$more_command3 .= " detail_".$value." = '".nl2br($xss['detail_'.$value.''])."', ";
	}
	
	# UPLOAD ############################################
	
	$total_delete = count($xss['delete_id']);
	for($i = 0; $i < $total_delete; $i++) {
		if(empty($xss['delete_id'][$i])) {
			// Skip empty id
		} else {
			$mw->saveLog('photos', $xss['delete_id'][$i], 'delete');
			@unlink($profilePath.$xss['delete_file'][$i]);
			@unlink($profilePath.'thumbnail/'.$xss['delete_file'][$i]);
		}
	}
	
	require('../include/class.image.php');
	
	$upload_report = '';
	$limit = 3000000;
	$total_file = count($_FILES['file']['tmp_name']);
	for($i = 0; $i < $total_file; $i++) {
		if(empty($_FILES['file']['tmp_name'][$i])) {
			if(empty($xss['log_id'][$i])) {
				// Skip real empty field
			} else {
				$mw->saveLog('photos', $xss['log_id'][$i]);
				$db->connect();
				$update = $db->command(" update ".$prefix."photos set _order = '".$i."', ".$mw->command3." where id = '".$xss['log_id'][$i]."' ");
				$db->close();
				if(!$update) {
					$upload_report .= '<div>Failed: file name '.$file_name.' cannot save.</div>';
				}
			}
		} else {
			$file = $_FILES['file']['tmp_name'][$i];
			$file_name = $_FILES['file']['name'][$i];
			$file_info = $img->imageInfo($file);
			
			if($file_info['size'] >= $limit) {
				$upload_report .= '<div>Failed: file name '.$file_name.' is larger than '.($limit / 1000000).'MB.</div>';
			} else if($file_info['width'] <= 0 || $file_info['height'] <= 0 || !in_array($file_info['ext'], $imageSet)) {
				$upload_report .= '<div>Failed: file name '.$file_name.' invalid type.</div>';
			} else {
				$tmp_name = md5($file);
				$save_name = time().'_'.mt_rand().'_'.$tmp_name.'.'.$file_info['ext'];
				
				$upload = @copy($file, $profilePath.$tmp_name);
				if(!$upload) {
					$upload_report .= '<div>Failed: file name '.$file_name.' cannot upload.</div>';
				} else {
					$img->resize($profilePath.$tmp_name, 480, 0, true, $profilePath.$save_name, true, false);
					$img->resize($profilePath.$save_name, 200, 0, true, $profilePath.'thumbnail/'.$save_name, false, false);
					
					if(empty($xss['log_id'][$i])) {
						$db->connect();
						$insert = $db->command(" insert into ".$prefix."photos (sessionid, file_name, _order, status, ".$mw->command1.") values ('".SESSIONID."', '".$save_name."', '".$i."', 'enable', ".$mw->command2.") ");
						$db->close();
						if(!$insert) {
							$upload_report .= '<div>Failed: file name '.$file_name.' cannot save.</div>';
						}
					} else if(!empty($xss['log_id'][$i])) {
						$mw->saveLog('photos', $xss['log_id'][$i]);
						$db->connect();
						$update = $db->command(" update ".$prefix."photos set file_name = '".$save_name."', _order = '".$i."', ".$mw->command3." where id = '".$xss['log_id'][$i]."' ");
						$db->close();
						if(!$update) {
							$upload_report .= '<div>Failed: file name '.$file_name.' cannot save.</div>';
						}
						
						@unlink($profilePath.$xss['log_file'][$i]);
						@unlink($profilePath.'thumbnail/'.$xss['log_file'][$i]);
					}
				}
			}
		}
	}
	
	if($xss['video_type'] == 'upload') {
		if(empty($_FILES['video']['tmp_name'])) {
			if(empty($xss['old_video'])) {
				$mw->returnError($xss['form_id'], $referer, 'Please upload video.');
			} else {
				$video_save_name = $xss['old_video'];
			}
		} else {
			$video = $_FILES['video']['tmp_name'];
			$video_name = $_FILES['video']['name'];
			$video_ext = strtolower(end(explode('.', $video_name)));
			$video_save_name = time().'_'.mt_rand().'_'.md5($video).'.'.$video_ext;
			if(!in_array($video_ext, $videoSet)) {
				$mw->returnError($xss['form_id'], $referer, 'Invalid video type, please try again.');
			} else {
				$upload = @copy($video, $videoPath.$video_save_name);
				if(!$upload) {
					$mw->returnError($xss['form_id'], $referer, 'Cannot upload video, please try again.');
				} else {
					if(!empty($xss['old_video'])) {
						@unlink($videoPath.$xss['old_video']);
					}
				}
			}
		}
	} else if($xss['video_type'] == 'embed') {
		if(empty($xss['embed'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please put video embed code.');
		} else {
			if(!empty($xss['old_video'])) {
				@unlink($videoPath.$xss['old_video']);
			}
		}
	} else {
		if(!empty($xss['old_video'])) {
			@unlink($videoPath.$xss['old_video']);
		}
	}

	# /UPLOAD ############################################
	
	# ADD ############################################
	
	if($xss['mode'] == 'add') {
		if(empty($xss['nickname']) || empty($xss['detail_'.$sysLang.'']) || empty($xss['receives']) || empty($xss['offers']) || empty($xss['availability']) || empty($xss['status'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
		}
		
		$db->connect();
		$insert = $db->command(" insert into ".$prefix."profiles (sessionid, nickname, height, weight, shoe_size, availability, availability_note, available_date, embed, video, video_type, show_video, _new, _hot, ".$more_command1." locked, status, ".$mw->command1.") values ('".SESSIONID."', '".$xss['nickname']."', '".$xss['height']."', '".$xss['weight']."', '".$xss['shoe_size']."', '".$xss['availability']."', '".nl2br($xss['availability_note'])."', '".$xss['available_date']."', '".$xss['embed']."', '".$video_save_name."', '".$xss['video_type']."', '".$xss['show_video']."', '".$xss['_new']."', '".$xss['_hot']."', ".$more_command2." '".$xss['locked']."', '".$xss['status']."', ".$mw->command2.") ");
		$db->close();
		if(!$insert) {
			$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
		}
		
		$load_id = $mw->getProfileId();
		
		$total_service = count($xss['receives']);
		for($i = 0; $i < $total_service; $i++) {
			$db->connect();
			$insert = $db->command(" insert into ".$prefix."profiles_service (profile_id, service_id, service_type) values ('".$load_id."', '".$xss['receives'][$i]."', 'receives') ");
			$db->close();
			if(!$insert) {
				$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
			}
		}
		
		$total_service = count($xss['offers']);
		for($i = 0; $i < $total_service; $i++) {
			$db->connect();
			$insert = $db->command(" insert into ".$prefix."profiles_service (profile_id, service_id, service_type) values ('".$load_id."', '".$xss['offers'][$i]."', 'offers') ");
			$db->close();
			if(!$insert) {
				$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
			}
		}
		
		$db->connect();
		$db->command(" update ".$prefix."photos set profile_id = '".$load_id."' where sessionid = '".SESSIONID."' ");
		$db->close();
		
		$mw->returnError('form_delete', $adminUrl.'profiles.php', 'Record saved.'.$upload_report, 'text_green');
	}
	
	# /ADD ############################################
	
	# EDIT ############################################
	
	if($xss['mode'] == 'edit') {
		if(empty($xss['nickname']) || empty($xss['detail_'.$sysLang.'']) || empty($xss['receives']) || empty($xss['offers']) || empty($xss['availability']) || empty($xss['status']) || empty($xss['id'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please complete all required fields.');
		}
		
		$load_id = $xss['id'];
		
		$mw->saveLog('profiles', $load_id);
		
		$db->connect();
		$update = $db->command(" update ".$prefix."profiles set nickname = '".$xss['nickname']."', ".$more_command3." height = '".$xss['height']."', weight = '".$xss['weight']."', shoe_size = '".$xss['shoe_size']."', availability = '".$xss['availability']."', availability_note = '".nl2br($xss['availability_note'])."', available_date = '".$xss['available_date']."', embed = '".$xss['embed']."', video = '".$video_save_name."', video_type = '".$xss['video_type']."', show_video = '".$xss['show_video']."', _new = '".$xss['_new']."', _hot = '".$xss['_hot']."', locked = '".$xss['locked']."', status = '".$xss['status']."', ".$mw->command3." where id = '".$load_id."' ");
		$db->close();
		if(!$update) {
			$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
		}
		
		$db->connect();
		$db->command(" delete from ".$prefix."profiles_service where profile_id = '".$load_id."' ");
		$db->close();
		
		$total_service = count($xss['receives']);
		for($i = 0; $i < $total_service; $i++) {
			$db->connect();
			$insert = $db->command(" insert into ".$prefix."profiles_service (profile_id, service_id, service_type) values ('".$load_id."', '".$xss['receives'][$i]."', 'receives') ");
			$db->close();
			if(!$insert) {
				$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
			}
		}
		
		$total_service = count($xss['offers']);
		for($i = 0; $i < $total_service; $i++) {
			$db->connect();
			$insert = $db->command(" insert into ".$prefix."profiles_service (profile_id, service_id, service_type) values ('".$load_id."', '".$xss['offers'][$i]."', 'offers') ");
			$db->close();
			if(!$insert) {
				$mw->returnError($xss['form_id'], $referer, 'Cannot save record, please try again.');
			}
		}
		
		$db->connect();
		$db->command(" update ".$prefix."photos set profile_id = '".$load_id."' where sessionid = '".SESSIONID."' ");
		$db->close();
		
		$mw->returnError('form_delete', $_POST['referer'], 'Record saved.'.$upload_report, 'text_green');
	}
	
	# /EDIT ############################################
	
	# DELETE ############################################
	
	if($xss['mode'] == 'delete') {
		if(empty($xss['delete']) || !is_array($xss['delete'])) {
			$mw->returnError($xss['form_id'], $referer, 'Please select records.');
		}
		
		$total_item = count($xss['delete']);
		for($i = 0; $i < $total_item; $i++) {
			$record = $mw->getRecord($prefix.'profiles', $xss['delete'][$i], 'id, nickname, video, locked');
			if($record['locked'] == 'yes') {
				$mw->returnError($xss['form_id'], $referer, 'Warning! record name '.$record['nickname'].' has been locked, please contact administrator.');
			}
			
			$mw->saveLog('profiles', $xss['delete'][$i], 'delete');
			
			$db->connect();
			$db->command(" delete from ".$prefix."profiles_service where profile_id = '".$xss['delete'][$i]."' ");
			$db->close();
			
			$db->connect();
			$photo = $db->select(" select id, file_name from ".$prefix."photos where profile_id = '".$xss['delete'][$i]."' ");
			$db->close();
			if(!$photo) {
				
			} else {
				$total_photo = count($photo);
				for($k = 0; $k < $total_photo; $k++) {
					$mw->saveLog('photos', $photo[$k]['id'], 'delete');
					@unlink($profilePath.$photo[$k]['file_name']);
					@unlink($profilePath.'thumbnail/'.$photo[$k]['file_name']);
				}
			}
			
			if(!empty($record['video'])) {
				@unlink($videoPath.$record['video']);
			}
		}
			
		$mw->returnError($xss['form_id'], $referer, 'Record saved.', 'text_green');
	}
	
	# /DELETE ############################################
?>