<?php
	require('../include/admin.php');
	
	$user_data = $mw->checkLogin(array('admin'));
	
	$rxss = $_SESSION['xss'];
	$xss = $mw->query($_GET, 'xss');
	
	$xss['mode'] = (empty($xss['mode'])) ? 'add' : $xss['mode'];
	
	$data = $rxss;
	if(!empty($xss['id'])) {
		$db->connect();
		$data = $db->select(" select * from ".$prefix."bookings where id = '".$xss['id']."' ");
		$db->close();
		if(!$data || $data['0']['id'] != $xss['id']) {
			$mw->notfound();
		}
		
		$data = $data['0'];
		
		if($data['_read'] != 'yes') {
			$mw->saveLog('bookings', $data['id']);

			$db->connect();
			$db->command(" update ".$prefix."bookings set _read = 'yes' where id = '".$data['id']."' ");
			$db->close();
		}
	}
	
	$data['refno'] = (empty($data['refno'])) ? 'Auto' : $data['refno'];
	
	$menu['bookings'] = 'active';
	
	$script['jquery_ui'] = 'yes';
	
	require($fullRoot.'include/html-top-admin.php');
?>
<!--e_left-->
<?php require($fullRoot.'include/e-left-admin.php'); ?>
<!--/e_left-->

<!--e_content-->
<div id="e_content">
	<div class="content_res">
		<h1 class="title oswald text_yellow give_space30">Booking Management</h1>
		
		<!--e_tool-->
		<div id="e_tool">
			<?php
				if($xss['mode'] == 'add') {
					echo '<h3 class="title oswald text_white give_space15 give_border">Add New Booking</h3>';
				} else if($xss['mode'] == 'edit') {
					echo '<h3 class="title oswald text_white give_space15 give_border">Edit Booking - '.$data['refno'].'</h3>';
				}
			?>
			<form action="<?php echo $adminUrl.'bookings-action.php'; ?>" method="post" id="form_default" enctype="multipart/form-data">
				<input type="hidden" name="mode" value="<?php echo $xss['mode']; ?>" />
				<input type="hidden" name="form_id" value="form_default" />
				<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
				<input type="hidden" name="referer" value="<?php echo urldecode($xss['referer']); ?>" />
				<div class="form_response hidden inline"><?php echo $_SESSION['form_response']; ?></div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Ref No.
					</div><!--
					--><div class="size2 inline">
						<?php echo $data['refno']; ?>
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Service Requires
					</div><!--
					--><div class="size2 inline">
						<select name="service" class="input">
							<?php
								foreach($array_service as $key => $value) {
									$selected = ($key == $data['service']) ? 'selected' : '';
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Select Escort(s)
					</div>
				</div>
				<div class="form_item">
					<div>
						<?php
							$option_profile = '';
							
							$db->connect();
							$profile = $db->select(" select * from ".$prefix."profiles order by nickname asc ");
							$db->close();
							if(!$profile) {
								
							} else {
								$total_item = count($profile);
								for($i = 0; $i < $total_item; $i++) {
									$option_profile .= '<option value="'.$profile[$i]['id'].'">'.$profile[$i]['nickname'].'</option>';
								}
							}
								
							foreach($array_escort_title as $key => $value) {
								$last = ($key == '2nd_team') ? 'last' : '';
								$selected_value = (empty($data[$key])) ? '' : $data[$key];
								
								echo '<div class="e_escort item inline '.$last.'" data-id="'.$key.'">
									<div class="title text_yellow">
										<strong>'.$value.'</strong>
									</div>
									<div class="loading hidden"></div>
									<div class="thumbnail">
										<img src="'.$fullUrl.'image-profile/empty.jpg" width="152" alt="'.$value.'" />
									</div>
									<div class="select">
										<select id="'.$key.'" name="'.$key.'" class="select_escort input">
											<option value=""></option>
											'.$option_profile.'
										</select>
									</div>
								</div>';
								
								echo '<script>$(\'#'.$key.' option[value="'.$selected_value.'"]\').attr(\'selected\', true);</script>';
							}
							
							unset($option_profile);
						?>
					</div>
					<script>
						function trackEscort(value, data_id) {
							$('.e_escort[data-id="'+data_id+'"] .loading').removeClass('hidden');
							$('.e_escort[data-id="'+data_id+'"] .thumbnail').html('').addClass('hidden');
							
							$('.e_escort[data-id="'+data_id+'"] .thumbnail').load('<?php echo $fullUrl; ?>en/track-escort.html?profile_id='+value+'&target='+data_id+'', function(){
								$('.e_escort[data-id="'+data_id+'"] .loading').addClass('hidden');
								$('.e_escort[data-id="'+data_id+'"] .thumbnail').removeClass('hidden');
							});
						}
						
						<?php
							foreach($array_escort_title as $key => $value) {
								$selected_value = (empty($data[$key])) ? '' : $data[$key];
								if(!empty($selected_value)) {
									echo 'trackEscort(\''.$selected_value.'\', \''.$key.'\');';
								}
							}
						?>
						
						$('.select_escort').bind('change', function(){
							var value = $(this).val();
							var data_id = $(this).attr('id');
							
							trackEscort(value, data_id);
						});
					</script>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Date of Appointment
					</div><!--
					--><div class="size1 inline">
						<input type="text" name="date" value="<?php echo $data['date']; ?>" class="input small datepicker" />
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Time of Appointment
					</div><!--
					--><div class="size1 inline give_break10">
						<select name="hour" class="input">
							<?php
								for($i = 1; $i <= 23; $i++) {
									$selected = ($data['hour'] == $i) ? 'selected' : '';
									echo '<option value="'.sprintf('%02d', $i).'" '.$selected.'>'.sprintf('%02d', $i).'</option>';
								}
							?>
						</select>
					</div><!--
					--><div class="size1 inline">
						<select name="min" class="input">
							<option value="00" <?php echo $min = ($data['min'] == '00') ? 'selected' : ''; ?>>00</option>
							<option value="30" <?php echo $min = ($data['min'] == '30') ? 'selected' : ''; ?>>30</option>
						</select>
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Duration
					</div><!--
					--><div class="size2 inline">
						<select name="duration" class="input">
							<?php
								foreach($array_duration as $key => $value) {
									$selected = ($data['duration'] == $key) ? 'selected' : '';
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form_item">
					<div class="size1 give_break10 inline">
						Outfit Request
					</div><!--
					--><div class="size2 inline">
						<select name="outfit" class="input">
							<?php
								foreach($array_outfit as $key => $value) {
									$selected = ($data['outfit'] == $key) ? 'selected' : '';
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form_item">
					<div class="size1 give_break10 inline">
						Special Requirements
					</div><!--
					--><div class="size5 inline">
						<textarea name="special" rows="8" class="input"><?php echo strip_tags(stripcslashes($data['special'])); ?></textarea>
					</div>
				</div>
				<div>&nbsp;</div><div>&nbsp;</div>
				<h2 class="text_yellow give_space15">Personal Informations</h2>
				<p>Star items = <strong class="text_yellow">Must fill-in</strong>, Address = <strong class="text_yellow">If known</strong></p>
				<div>&nbsp;</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Salutation
					</div><!--
					--><div class="size1 inline">
						<select name="salutation" class="input">
							<option value=""></option>
							<?php
								foreach($array_salutation as $key => $value) {
									$selected = ($data['salutation'] == $key) ? 'selected' : '';
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						First Name
					</div><!--
					--><div class="size2 inline">
						<input type="text" name="first_name" value="<?php echo $data['first_name']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Last Name
					</div><!--
					--><div class="size2 inline">
						<input type="text" name="last_name" value="<?php echo $data['last_name']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Email Address
					</div><!--
					--><div class="size3 inline">
						<input type="text" name="email" value="<?php echo $data['email']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Phone Number
					</div><!--
					--><div class="size2 inline">
						<input type="text" name="phone_number" value="<?php echo $data['phone_number']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Hotel
					</div><!--
					--><div class="size3 inline">
						<select name="hotel" class="input">
							<option value=""></option>
							<?php
								$db->connect();
								$hotel = $db->select(" select * from ".$prefix."hotels where status = 'enable' order by name asc ");
								$db->close();
								if(!$hotel) {
									
								} else {
									$total_item = count($hotel);
									for($i = 0; $i < $total_item; $i++) {
										$selected = ($hotel[$i]['id'] == $data['hotel']) ? 'selected' : '';
										echo '<option value="'.$hotel[$i]['id'].'" '.$selected.'>'.$hotel[$i]['name'].'</option>';
									}
								}
							?>
						</select>
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Room Number
					</div><!--
					--><div class="size1 inline">
						<input type="text" name="room_number" value="<?php echo $data['room_number']; ?>" class="input small" />
					</div>
				</div>
				<div class="form_item">
					<div class="size1 give_break10 inline">
						Address 
					</div><!--
					--><div class="size3 inline">
						<input type="text" name="address" value="<?php echo $data['address']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						How to contact?
					</div><!--
					--><div class="size1 inline">
						<select name="contact" class="input">
							<option value=""></option>
							<?php
								foreach($array_contact as $key => $value) {
									$selected = ($data['contact'] == $key) ? 'selected' : '';
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
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
								foreach($array_status_contact as $key => $value) {
									$selected = ($key == $data['status']) ? 'selected' : '';
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
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

<div class="clear"></div>
<?php
	require($fullRoot.'include/html-bottom-admin.php');
?>