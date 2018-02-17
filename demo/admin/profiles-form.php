<?php
	require('../include/admin.php');
	
	$user_data = $mw->checkLogin(array('admin'));
	
	$rxss = $_SESSION['xss'];
	$xss = $mw->query($_GET, 'xss');
	
	$xss['mode'] = (empty($xss['mode'])) ? 'add' : $xss['mode'];
	
	$availability_hidden = 'hidden';
	
	$data = $rxss;
	if(!empty($xss['id'])) {
		$db->connect();
		$data = $db->select(" select * from ".$prefix."profiles where id = '".$xss['id']."' ");
		$db->close();
		if(!$data || $data['0']['id'] != $xss['id']) {
			$mw->notfound();
		}
		
		$data = $data['0'];
		
		$availability_hidden = ($data['availability'] == 'unavailable') ? '' : 'hidden';
	}
	
	$video_hidden = ($data['video_type'] == 'upload') ? '' : 'hidden';
	$embed_hidden = ($data['video_type'] == 'embed') ? '' : 'hidden';
	
	$menu['profiles'] = 'active';
	
	$script['jquery_ui'] = 'yes';
	
	require($fullRoot.'include/html-top-admin.php');
?>
<!--e_left-->
<?php require($fullRoot.'include/e-left-admin.php'); ?>
<!--/e_left-->

<!--e_content-->
<div id="e_content">
	<div class="content_res">
		<h1 class="title oswald text_yellow give_space30">Profile Management</h1>
		
		<!--e_tool-->
		<div id="e_tool">
			<?php
				if($xss['mode'] == 'add') {
					echo '<h3 class="title oswald text_white give_space15 give_border">Add New Profile</h3>';
				} else if($xss['mode'] == 'edit') {
					echo '<h3 class="title oswald text_white give_space15 give_border">Edit Profile - '.$data['nickname'].'</h3>';
				}
			?>
			<form action="<?php echo $adminUrl.'profiles-action.php'; ?>" method="post" id="form_default" enctype="multipart/form-data">
				<input type="hidden" name="mode" value="<?php echo $xss['mode']; ?>" />
				<input type="hidden" name="form_id" value="form_default" />
				<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
				<input type="hidden" name="referer" value="<?php echo urldecode($xss['referer']); ?>" />
				<div class="form_response hidden inline"><?php echo $_SESSION['form_response']; ?></div>
				<div class="form_item">
					<div class="size1 give_break10 inline">
						Select language
					</div><!--
					--><div class="size5 inline">
						<?php echo $mw->makeLangButton(); ?>
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required inline give_break10">
						Nickname
					</div><!--
					--><div class="size1 inline">
						<input type="text" name="nickname" value="<?php echo $data['nickname']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="size1 inline give_break10">
						Height (cm)
					</div><!--
					--><div class="size1 give_break10 inline">
						<input type="text" name="height" value="<?php echo $data['height']; ?>" class="input" />
					</div><!--
					--><div class="size1 text_right inline give_break10">
						Weight (kg)
					</div><!--
					--><div class="size1 give_break10 inline">
						<input type="text" name="weight" value="<?php echo $data['weight']; ?>" class="input" />
					</div><!--
					--><div class="size1 inline text_right give_break10">
						Shoe Size (eu)
					</div><!--
					--><div class="size1 inline">
						<input type="text" name="shoe_size" value="<?php echo $data['shoe_size']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="size1 inline give_break10">
						&nbsp;
					</div><!--
					--><div class="size5 text_hint inline">
						* Height, weight and shoe size are allow only in numeric 0-9 and &quot;.&quot;
					</div>
				</div>
				<div class="form_item">
					<div class="size1 top required give_break10 inline">
						Details
					</div><!--
					--><div class="size5 inline">
						<?php
							$hidden = '';
							foreach($languageSet as $key => $value) {
								echo '<div class="multi_input '.$hidden.'" data-lang="'.$value.'"><textarea name="detail_'.$value.'" rows="8" class="input">'.strip_tags(stripcslashes($data['detail_'.$value.''])).'</textarea></div>';
								$hidden = 'hidden';
							}
						?>
					</div>
				</div>
				<div class="form_item">
					<div class="size1 top required inline give_break10">
						Services
					</div><!--
					--><div class="service_list size5 inline">
						<div class="item inline last_row">
							<div class="form_item">
								<strong>Receives</strong>
							</div>
							<?php
								$db->connect();
								$receives = $db->select(" select id, name_".$sysLang." from ".$prefix."services where receives = 'yes' order by name_".$sysLang." asc ");
								$db->close();
								if(!$receives) {
									// Empty
								} else {
									$total_item = count($receives);
									for($i = 0; $i < $total_item; $i++) {
										$checked = 'checked';
										if($xss['mode'] == 'edit') {
											$db->connect();
											$checked = $db->select(" select id from ".$prefix."profiles_service where profile_id = '".$data['id']."' and service_id = '".$receives[$i]['id']."' and service_type = 'receives' ");
											$db->close();
											$checked = (!$checked) ? '' : 'checked';
										}
										
										echo '<div class="form_item">
											<input type="checkbox" name="receives[]" value="'.$receives[$i]['id'].'" '.$checked.' /> '.$receives[$i]['name_'.$sysLang.''].'
										</div>';
									}
								}

								unset($receives);
							?>
						</div><!--
						--><div class="item inline last last_row">
							<div class="form_item">
								<strong>Offers</strong>
							</div>
							<?php
								$db->connect();
								$offers = $db->select(" select id, name_".$sysLang." from ".$prefix."services where offers = 'yes' order by name_".$sysLang." asc ");
								$db->close();
								if(!$offers) {
									// Empty
								} else {
									$total_item = count($offers);
									for($i = 0; $i < $total_item; $i++) {
										$checked = 'checked';
										if($xss['mode'] == 'edit') {
											$db->connect();
											$checked = $db->select(" select id from ".$prefix."profiles_service where profile_id = '".$data['id']."' and service_id = '".$offers[$i]['id']."' and service_type = 'offers' ");
											$db->close();
											$checked = (!$checked) ? '' : 'checked';
										}
										
										echo '<div class="form_item">
											<input type="checkbox" name="offers[]" value="'.$offers[$i]['id'].'" '.$checked.' /> '.$offers[$i]['name_'.$sysLang.''].'
										</div>';
									}
								}
								
								unset($offers);
							?>
						</div>
					</div>
				</div>
				<div class="form_item">
					<div class="size1 inline give_break10">
						Upload Image
					</div><!--
					--><div class="size5 text_hint inline">
						* Allow only gif, jpg, png max file size 3mb. Best view in 480 X 640 pixels
					</div>
				</div>
				<div class="form_item">
					<div class="size1 inline give_break10">
						&nbsp;
					</div><!--
					--><div id="place_file" class="size5 inline">
						<div id="drag_area" class="drag_area">
							<?php
								$db->connect();
								$photo = $db->select(" select id, file_name, _order from ".$prefix."photos where profile_id = '".$data['id']."' order by _order asc ");
								$db->close();
								if($xss['mode'] == 'add' || !$photo) {
									?>
										<div class="item">
											<div class="size2">
												<input type="file" name="file[]" />
												<input type="hidden" name="log_id[]" value="" class="log_id" />
												<input type="hidden" name="log_file[]" value="" class="log_file" />
											</div>
											<a href="javascript:;" class="button_remove" data-id="">&nbsp;</a>
										</div>
									<?php
								} else {
									$total_item = count($photo);
									for($i = 0; $i < $total_item; $i++) {
										?>
											<div class="item">
												<div class="size1 give_break10 inline">
													<img src="<?php echo $fullUrl.'image-profile/thumbnail/'.$photo[$i]['file_name']; ?>" width="121" alt="" />
												</div><!--
												--><div class="size2 inline">
													<input type="file" name="file[]" />
													<input type="hidden" name="log_id[]" value="<?php echo $photo[$i]['id']; ?>" class="log_id" />
													<input type="hidden" name="log_file[]" value="<?php echo $photo[$i]['file_name']; ?>" class="log_file" />
												</div>
												<a href="javascript:;" class="button_remove" data-id="<?php echo $photo[$i]['id']; ?>">&nbsp;</a>
											</div>
										<?php
									}
								}
							?>
						</div>
						<div class="button_add">
							<a href="javascript:;">+ Add more</a>
						</div>
					</div>
				</div>
				<?php
					if(!empty($data['video'])) {
						?>
							<div class="form_item">
								<div class="size1 inline give_break10">
									&nbsp;
								</div><!--
								--><div class="size5 inline">
									<link type="text/css" rel="stylesheet" href="<?php echo $fullUrl; ?>videocontrol/jquery.videocontrols.css">
									<script type="text/javascript" src="<?php echo $fullUrl; ?>videocontrol/jquery.videocontrols.js"></script>
									<video id="myVideo_demo" width="640" height="480" controls="controls" poster="<?php echo $fullUrl.'image/video.jpg'; ?>">
										<source src="<?php echo $fullUrl.'video/'.$data['video']; ?>">
									</video>
									<script type="text/javascript">
										$(document).ready(function () {
											$('#myVideo_demo').videocontrols({
												//markers: [40, 84, 158, 194, 236, 272, 317, 344, 397, 447, 490, 580],
												preview: {
													step: 50,
													width: 640,
													height: 480
												},
												theme: {
													progressbar: 'red',
													range: 'yellow',
													volume: 'yellow'
												}
											});
										});
									</script>
								</div>
							</div>
						<?php
					} else if(!empty($data['embed'])) {
						?>
							<div class="form_item">
								<div class="size1 inline give_break10">
									&nbsp;
								</div><!--
								--><div class="size5 inline">
									<?php echo htmlspecialchars_decode($data['embed']); ?>
								</div>
							</div>
						<?php
					}
				?>
				<div class="form_item">
					<div class="size1 inline give_break10">
						Video
					</div><!--
					--><div class="size1 give_break10 inline">
						<select id="show_video" name="show_video" class="input">
							<option value=""></option>
							<?php
								foreach($array_video_show as $key => $value) {
									$selected = ($key == $data['show_video']) ? 'selected' : '';
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
					</div><!--
					--><div class="size1 give_break10 inline">
						<select id="video_type" name="video_type" class="input">
							<option value=""></option>
							<?php
								foreach($array_video_type as $key => $value) {
									$selected = ($key == $data['video_type']) ? 'selected' : '';
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
					</div><!--
					--><div class="size2 inline video_hidden <?php echo $video_hidden; ?>">
						<input type="file" id="video" name="video" />
						<input type="hidden" name="old_video" value="<?php echo $data['video']; ?>" />
					</div>
				</div>
				<div class="form_item video_hidden <?php echo $video_hidden; ?>">
					<div class="size1 inline give_break10">
						&nbsp;
					</div><!--
					--><div class="size5 text_hint inline">
						* Allow only mp4, 3gp, wmv, avi. Best view in 640 X 480 pixels
					</div>
				</div>
				<div class="form_item embed_hidden <?php echo $embed_hidden; ?>">
					<div class="size1 inline give_break10">
						&nbsp;
					</div><!--
					--><div class="size5 inline">
						<textarea id="embed" name="embed" rows="5" class="input"><?php echo strip_tags(stripcslashes($data['embed'])); ?></textarea>
					</div>
				</div>
				<div class="form_item embed_hidden <?php echo $embed_hidden; ?>">
					<div class="size1 inline give_break10">
						&nbsp;
					</div><!--
					--><div class="size5 text_hint inline">
						* Best view in 640 X 480 pixels
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Availability
					</div><!--
					--><div class="size2 give_break10 inline">
						<select id="select_availability" name="availability" class="input">
							<option value=""></option>
							<?php
								foreach($array_availability as $key => $value) {
									$selected = ($key == $data['availability']) ? 'selected' : '';
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
					</div><!--
					--><div class="availability_hidden <?php echo $availability_hidden; ?> size1 give_break10 inline">
						Available Date
					</div><!--
					--><div class="availability_hidden <?php echo $availability_hidden; ?> size2 inline">
						<input type="text" id="input_available_date" name="available_date" value="<?php echo $data['available_date']; ?>" class="input datepicker" />
					</div>
				</div>
				<div class="availability_hidden <?php echo $availability_hidden; ?> form_item">
					<div class="size1 inline give_break10">
						Notes
					</div><!--
					--><div class="size5 inline">
						<textarea id="input_availability_note" name="availability_note" class="input" rows="5"><?php echo strip_tags($data['availability_note']); ?></textarea>
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Status
					</div><!--
					--><div class="size2 inline">
						<select name="status" class="input">
							<option value=""></option>
							<?php
								foreach($array_status as $key => $value) {
									$selected = ($key == $data['status']) ? 'selected' : '';
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form_item">
					<div class="size1 inline give_break10">
						&nbsp;
					</div><!--
					--><div class="size1 give_break10 inline">
						<input type="checkbox" name="_new" value="yes" <?php if(strtolower($data['_new']) == 'yes') { echo 'checked'; } ?> /> New Escort
					</div><!--
					--><div class="size1 inline">
						<input type="checkbox" name="_hot" value="yes" <?php if(strtolower($data['_hot']) == 'yes') { echo 'checked'; } ?> /> Hot Escort
					</div>
				</div>
				<div class="form_item last">
					<div class="size1 give_break10 inline">
						&nbsp;
					</div><!--
					--><div class="size1 give_break10 inline">
						<?php
							if($user_data['level'] == 'admin' || $user_data['level'] == 'system') {
								$checked = (strtolower($data['locked']) == 'yes') ? 'checked' : '';
								echo '<input type="checkbox" name="locked" value="yes" '.$checked.' /> Lock this record';
								$checked = '';
							}
						?>
					</div><!--
					--><div class="size2 give_break10 inline">
						&nbsp;
					</div><!--
					--><div class="size2 inline">
						<div class="button_submit two"><a href="javascript:;" title="Save" data-type="submit" data-id="form_default"><strong>Save</strong></a></div>
					</div>
				</div>
				<div id="drop_area"></div>
			</form>
		</div>
		<!--/e_tool-->
	</div>
</div>
<!--/e_content-->
<script>
	$('#select_availability').bind('change', function(){
		var value = $(this).val();
		
		$('.availability_hidden').addClass('hidden');
		$('#input_available_date').attr('value', '');
		$('#input_availability_note').val('');
		
		if(value == 'unavailable') {
			$('.availability_hidden').removeClass('hidden');
		}
	});
	
	$('#place_file .button_add a').live('click', function(){
		$('#drag_area').append('<div class="item"><div class="size2"><input type="file" name="file[]" /><input type="hidden" name="log_id[]" value="" class="log_id" /></div><a href="javascript:;" class="button_remove" data-id="">&nbsp;</a></div>');
	});
	
	$('#place_file a.button_remove').live('click', function(){
		$(this).parent('.item').children('.size2').children('.log_id').attr('name', 'delete_id[]').clone().appendTo('#drop_area');
		$(this).parent('.item').children('.size2').children('.log_file').attr('name', 'delete_file[]').clone().appendTo('#drop_area');
		$(this).parent('.item').remove();
	});
	
	var control = $('#video');
	$('#video_type').bind('change', function(){
		var value = $(this).val();
		
		$('#embed').val('');
		$('.embed_hidden').addClass('hidden');
		control.replaceWith(control = control.clone(true));
		$('.video_hidden').addClass('hidden');
		
		if(value == 'embed') {
			$('.embed_hidden').removeClass('hidden');
		} else if(value == 'upload') {
			$('.video_hidden').removeClass('hidden');
		}
	});
</script>

<div class="clear"></div>
<?php
	require($fullRoot.'include/html-bottom-admin.php');
?>