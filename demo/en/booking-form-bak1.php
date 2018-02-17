<?php
	$rxss = $_SESSION['xss'];
	$xss = $mw->query($_GET, 'xss');

	$script['jquery_ui'] = 'yes';

	require($fullRoot.'include/html-top.php');
?>
<!--e_top-->
<?php require($fullRoot.'include/e-top-'.$sysLang.'.php'); ?>
<!--/e_top-->

<!--e_menu-->
<?php require($fullRoot.'include/e-menu-'.$sysLang.'.php'); ?>
<!--/e_menu-->

<!--e_slide-->
<?php require($fullRoot.'include/e-slide-'.$sysLang.'.php'); ?>
<!--/e_slide-->

<!--e_wrapper-->
<div id="e_wrapper">
	<div class="content_res">
		<!--e_left-->
		<?php require($fullRoot.'include/e-left-'.$sysLang.'.php'); ?>
		<!--/e_left-->

		<!--e_content-->
		<div id="e_content">
			<h1 class="title text_yellow give_space10"><strong>Booking</strong></h1>
			<h2 class="subtitle text_yellow give_space15">Service Informations</h2>
			<p class="text_hint">To function properly, this page requires JavaScript to be enabled.</p>
			<div>&nbsp;</div><div>&nbsp;</div>

			<form action="<?php echo $fullUrl.$sysLang.'/booking-action.html'; ?>" method="post" id="form_add">
				<input type="hidden" name="mode" value="add" />
				<input type="hidden" name="form_id" value="form_add" />
				<div class="form_response hidden"><?php echo $_SESSION['form_response']; ?></div>
				<div class="form_item">
					<div class="label inline">
						Service Requires: <strong>*</strong>
					</div><!--
					--><div class="inline">
						<select name="service" class="input">
							<?php
								foreach($array_service as $key => $value) {
									$selected = ($key == $rxss['service']) ? 'selected' : '';
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form_item">
					<div class="label inline">
						Select Escort(s): <strong>*</strong>
					</div>
				</div>
				<div class="form_item">
					<div class="inline">
						<?php
							$option_profile = '';

							$db->connect();
							$profile = $db->select(" select * from ".$prefix."profiles where status = 'enable' order by nickname asc ");
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
								$selected_value = (empty($xss[$key])) ? (empty($rxss[$key])) ? '' : $rxss[$key] : $xss[$key];

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
							}

							unset($option_profile);
						?>
					</div>
				</div>
				<div class="form_item">
					<div class="label inline">
						Date of Appointment: <strong>*</strong>
					</div><!--
					--><div class="inline">
						<input type="text" name="date" value="<?php echo $rxss['date']; ?>" class="input small datepicker" />
					</div>
				</div>
				<div class="form_item">
					<div class="label inline">
						Time of Appointment: <strong>*</strong>
					</div><!--
					--><div class="inline give_break10">
						<select name="hour" class="input">
							<?php
								for($i = 1; $i <= 23; $i++) {
									$selected = ($rxss['hour'] == $i) ? 'selected' : '';
									echo '<option value="'.sprintf('%02d', $i).'" '.$selected.'>'.sprintf('%02d', $i).'</option>';
								}
							?>
						</select>
					</div><!--
					--><div class="inline">
						<select name="min" class="input">
							<option value="00" <?php echo $min = ($rxss['min'] == '00') ? 'selected' : ''; ?>>00</option>
							<option value="30" <?php echo $min = ($rxss['min'] == '30') ? 'selected' : ''; ?>>30</option>
						</select>
					</div>
				</div>
				<div class="form_item">
					<div class="label inline">
						Duration: <strong>*</strong>
					</div><!--
					--><div class="inline">
						<select name="duration" class="input">
							<?php
								foreach($array_duration as $key => $value) {
									$selected = ($rxss['duration'] == $key) ? 'selected' : '';
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form_item">
					<div class="label inline">
						Outfit Request:
					</div><!--
					--><div class="inline">
						<select name="outfit" class="input">
							<?php
								foreach($array_outfit as $key => $value) {
									$selected = ($rxss['outfit'] == $key) ? 'selected' : '';
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form_item">
					<div class="label inline">
						Special Requirements:
					</div><!--
					--><div class="inline">
						<textarea name="special" rows="8" class="input"><?php echo strip_tags(stripcslashes($rxss['special'])); ?></textarea>
					</div>
				</div>
				<div>&nbsp;</div><div>&nbsp;</div>
				<h2 class="subtitle text_yellow give_space15">Personal Informations</h2>
				<p>Star items = <strong class="text_yellow">Must fill-in</strong>, Address = <strong class="text_yellow">If known</strong></p>
				<div>&nbsp;</div>
				<div class="form_item">
					<div class="label inline">
						I am a: <strong>*</strong>
					</div><!--
					--><div class="inline">
						<select name="salutation" class="input">
							<option value=""></option>
							<?php
								foreach($array_salutation as $key => $value) {
									$selected = ($rxss['salutation'] == $key) ? 'selected' : '';
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form_item">
					<div class="label inline">
						First Name: <strong>*</strong>
					</div><!--
					--><div class="inline">
						<input type="text" name="first_name" value="<?php echo $rxss['first_name']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="label inline">
						Last Name: <strong>*</strong>
					</div><!--
					--><div class="inline">
						<input type="text" name="last_name" value="<?php echo $rxss['last_name']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="label inline">
						Email Address: <strong>*</strong>
					</div><!--
					--><div class="inline">
						<input type="text" name="email" value="<?php echo $rxss['email']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="label inline">
						Phone Number: <strong>*</strong>
					</div><!--
					--><div class="inline">
						<input type="text" name="phone_number" value="<?php echo $rxss['phone_number']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="label inline">
						Hotel: <strong>*</strong>
					</div><!--
					--><div class="inline">
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
										$selected = ($hotel[$i]['id'] == $rxss['hotel']) ? 'selected' : '';
										echo '<option value="'.$hotel[$i]['id'].'" '.$selected.'>'.$hotel[$i]['name'].'</option>';
									}
								}
							?>
						</select>
					</div>
				</div>
				<div class="form_item">
					<div class="label inline">
						Room Number: <strong>*</strong>
					</div><!--
					--><div class="inline">
						<input type="text" name="room_number" value="<?php echo $rxss['room_number']; ?>" class="input small" />
					</div>
				</div>
				<div class="form_item">
					<div class="label inline">
						Address:
					</div><!--
					--><div class="inline">
						<input type="text" name="address" value="<?php echo $rxss['address']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="label inline">
						How should we contact you?: <strong>*</strong>
					</div><!--
					--><div class="inline">
						<select name="contact" class="input">
							<option value=""></option>
							<?php
								foreach($array_contact as $key => $value) {
									$selected = ($rxss['contact'] == $key) ? 'selected' : '';
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="form_item">
					<div class="label inline">
						&nbsp;
					</div><!--
					--><div class="inline">
						<?php
							require_once($fullRoot.'include/recaptchalib.php');
							echo recaptcha_get_html($publickey);
						?>
					</div>
				</div>
				<div class="form_item last">
					<div class="label inline">
						&nbsp;
					</div><!--
					--><div class="inline">
						<div class="button_submit inline fix_button small oswald">
							<div class="left inline">&nbsp;</div><!--
							--><div class="body inline">
								<a href="javascript:;" title="Submit" data-type="submit" data-id="form_add" class="text_white">SUBMIT</a>
							</div><!--
							--><div class="right inline">&nbsp;</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<!--/e_content-->

		<!--e_right-->
		<?php require($fullRoot.'include/e-right-'.$sysLang.'.php'); ?>
		<!--/e_right-->

		<div class="clear"></div>
	</div>
</div>
<!--/e_wrapper-->

<!--e_footer-->
<?php require($fullRoot.'include/e-footer-'.$sysLang.'.php'); ?>
<!--/e_footer-->
<?php
	require($fullRoot.'include/html-bottom.php');
?>
