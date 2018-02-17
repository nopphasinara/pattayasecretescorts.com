<?php
	require('../include/admin.php');
	
	$user_data = $mw->checkLogin(array('admin'));
	
	$rxss = $_SESSION['xss'];
	$xss = $mw->query($_GET, 'xss');
	
	$xss['mode'] = (empty($xss['mode'])) ? 'add' : $xss['mode'];
	
	$data = $rxss;
	if(!empty($xss['id'])) {
		$db->connect();
		$data = $db->select(" select * from ".$prefix."banners where id = '".$xss['id']."' ");
		$db->close();
		if(!$data || $data['0']['id'] != $xss['id']) {
			$mw->notfound();
		}
		
		$data = $data['0'];
	}
	
	$file_hidden = ($data['banner_type'] == 'image') ? '' : 'hidden';
	
	$menu['banners'] = 'active';
	
	require($fullRoot.'include/html-top-admin.php');
?>
<!--e_left-->
<?php require($fullRoot.'include/e-left-admin.php'); ?>
<!--/e_left-->

<!--e_content-->
<div id="e_content">
	<div class="content_res">
		<h1 class="title oswald text_yellow give_space30">Banner Management</h1>
		
		<!--e_tool-->
		<div id="e_tool">
			<?php
				if($xss['mode'] == 'add') {
					echo '<h3 class="title oswald text_white give_space15 give_border">Add New Banner</h3>';
				} else if($xss['mode'] == 'edit') {
					echo '<h3 class="title oswald text_white give_space15 give_border">Edit Banner - '.$data['name_'.$sysLang.''].'</h3>';
				}
			?>
			<form action="<?php echo $adminUrl.'banners-action.php'; ?>" method="post" id="form_default" enctype="multipart/form-data">
				<input type="hidden" name="mode" value="<?php echo $xss['mode']; ?>" />
				<input type="hidden" name="form_id" value="form_default" />
				<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
				<input type="hidden" name="old_file" value="<?php echo $data['file_name']; ?>" />
				<input type="hidden" name="referer" value="<?php echo urldecode($xss['referer']); ?>" />
				<div class="form_response hidden inline"><?php echo $_SESSION['form_response']; ?></div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Name
					</div><!--
					--><div class="size3 inline">
						<input type="text" name="name" value="<?php echo $data['name']; ?>" class="input" />
					</div>
				</div>
				<?php
					if($data['banner_type'] == 'image' && !empty($data['file_name'])) {
						?>
							<div class="form_item">
								<div class="size1 give_break10 inline">
									&nbsp;
								</div><!--
								--><div class="size3 inline">
									<img src="<?php echo $fullUrl.'image-banner/'.$data['file_name']; ?>" width="150" alt="" />
								</div>
							</div>
						<?php
					}
				?>
				<div class="form_item">
					<div class="size1 top required give_break10 inline">
						Banner Type
					</div><!--
					--><div class="size1 give_break10 inline">
						<select id="banner_type" name="banner_type" class="input">
							<option value=""></option>
							<?php
								foreach($array_banner_type as $key => $value) {
									$selected = ($key == $data['banner_type']) ? 'selected' : '';
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
					</div><!--
					--><div class="file_hidden <?php echo $file_hidden; ?> size4 inline">
						<input type="file" id="file" name="file" />
					</div>
				</div>
				<div class="file_hidden <?php echo $file_hidden; ?> form_item">
					<div class="size1 inline give_break10">
						&nbsp;
					</div><!--
					--><div class="size5 text_hint inline">
						* Allow only gif, jpg, png max file size 3mb. Maximum width 150 pixels
					</div>
				</div>
				<div class="form_item">
					<div class="size1 inline give_break10">
						Link
					</div><!--
					--><div class="size3 give_break10 inline">
						<input type="text" name="link" value="<?php echo $data['link']; ?>" class="input" />
					</div><!--
					--><div class="size2 inline">
						<input type="checkbox" name="_blank" value="yes" <?php if(strtolower($data['_blank']) == 'yes') { echo 'checked'; } ?> /> Open link in new window
					</div>
				</div>
				<div class="form_item">
					<div class="size1 inline give_break10">
						&nbsp;
					</div><!--
					--><div class="size4 text_hint inline">
						If have, please type your link including &quot;http://&quot;
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required inline give_break10">
						Banner Side
					</div><!--
					--><div class="size2 inline">
						<select name="banner_side" class="input">
							<option value=""></option>
							<?php
								foreach($array_banner_side as $key => $value) {
									$selected = ($key == $data['banner_side']) ? 'selected' : '';
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
								foreach($array_status as $key => $value) {
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
<script>
	var control = $('#file');
	$('#banner_type').bind('change', function(){
		var value = $(this).val();
		control.replaceWith(control = control.clone(true));
		$('.file_hidden').addClass('hidden');
		if(value == 'image') {
			$('.file_hidden').removeClass('hidden');
		}
	});
</script>

<div class="clear"></div>
<?php
	require($fullRoot.'include/html-bottom-admin.php');
?>