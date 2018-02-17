<?php
	require('../include/admin.php');
	
	$user_data = $mw->checkLogin(array('admin'));
	
	$rxss = $_SESSION['xss'];
	$xss = $mw->query($_GET, 'xss');
	
	$xss['mode'] = (empty($xss['mode'])) ? 'add' : $xss['mode'];
	
	$data = $rxss;
	if(!empty($xss['id'])) {
		$db->connect();
		$data = $db->select(" select * from ".$prefix."users where id = '".$xss['id']."' ");
		$db->close();
		if(!$data || $data['0']['id'] != $xss['id']) {
			$mw->notfound();
		}
		
		$data = $data['0'];
	}
	
	$menu['users'] = 'active';
	
	require($fullRoot.'include/html-top-admin.php');
?>
<!--e_left-->
<?php require($fullRoot.'include/e-left-admin.php'); ?>
<!--/e_left-->

<!--e_content-->
<div id="e_content">
	<div class="content_res">
		<h1 class="title oswald text_yellow give_space30">User Management</h1>
		
		<!--e_tool-->
		<div id="e_tool">
			<?php
				if($xss['mode'] == 'add') {
					echo '<h3 class="title oswald text_white give_space15 give_border">Add New User</h3>';
				} else if($xss['mode'] == 'edit') {
					echo '<h3 class="title oswald text_white give_space15 give_border">Edit User - '.$data['name'].'</h3>';
				}
			?>
			<form action="<?php echo $adminUrl.'users-action.php'; ?>" method="post" id="form_default">
				<input type="hidden" name="mode" value="<?php echo $xss['mode']; ?>" />
				<input type="hidden" name="form_id" value="form_default" />
				<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
				<input type="hidden" name="old_email" value="<?php echo $data['email']; ?>" />
				<input type="hidden" name="old_name" value="<?php echo $data['name']; ?>" />
				<input type="hidden" name="referer" value="<?php echo urldecode($xss['referer']); ?>" />
				<div class="form_response hidden inline"><?php echo $_SESSION['form_response']; ?></div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Name
					</div><!--
					--><div class="size2 give_break10 inline">
						<input type="text" name="name" value="<?php echo $data['name']; ?>" class="input" />
					</div><!--
					--><div class="size1 required give_break10 text_right inline">
						Email
					</div><!--
					--><div class="size2 inline">
						<input type="text" name="email" value="<?php echo $data['email']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Password
					</div><!--
					--><div class="size2 give_break10 inline">
						<input type="password" name="password" class="input" />
					</div><!--
					--><div class="size1 required give_break10 text_right inline">
						Confirm Password
					</div><!--
					--><div class="size2 inline">
						<input type="password" name="confirm_password" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="size1 give_break10 inline">
						&nbsp;
					</div><!--
					--><div class="size5 text_hint inline">
						* Password should be minimum 5 characters length. (Leave blank to skip password change)
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Level
					</div><!--
					--><div class="size2 inline">
						<select name="level" class="input">
							<option value=""></option>
							<?php
								foreach($array_level as $key => $value) {
									$selected = ($key == $data['level']) ? 'selected' : '';
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