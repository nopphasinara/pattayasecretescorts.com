<?php
	require('../include/admin.php');

	$user_data = $mw->checkLogin(array('admin'));

	$rxss = $_SESSION['xss'];
	$xss = $mw->query($_GET, 'xss');

	$xss['mode'] = (empty($xss['mode'])) ? 'add' : $xss['mode'];

	$data = $rxss;
	if(!empty($xss['id'])) {
		$db->connect();
		$data = $db->select(" select * from ".$prefix."hotels where id = '".$xss['id']."' ");
		$db->close();
		if(!$data || $data['0']['id'] != $xss['id']) {
			$mw->notfound();
		}

		$data = $data['0'];
	}

	$menu['hotels'] = 'active';

	require($fullRoot.'include/html-top-admin.php');
?>
<!--e_left-->
<?php require($fullRoot.'include/e-left-admin.php'); ?>
<!--/e_left-->

<!--e_content-->
<div id="e_content">
	<div class="content_res">
		<h1 class="title oswald text_yellow give_space30">Hotel Management</h1>

		<!--e_tool-->
		<div id="e_tool">
			<?php
				if($xss['mode'] == 'add') {
					echo '<h3 class="title oswald text_white give_space15 give_border">Add New Hotel</h3>';
				} else if($xss['mode'] == 'edit') {
					echo '<h3 class="title oswald text_white give_space15 give_border">Edit Hotel - '.$data['name'].'</h3>';
				}
			?>
			<form action="<?php echo $adminUrl.'hotels-action.php'; ?>" method="post" id="form_default" enctype="multipart/form-data">
				<input type="hidden" name="mode" value="<?php echo $xss['mode']; ?>" />
				<input type="hidden" name="form_id" value="form_default" />
				<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
				<input type="hidden" name="old_name" value="<?php echo $data['name']; ?>" />
				<input type="hidden" name="referer" value="<?php echo urldecode($xss['referer']); ?>" />
				<div class="form_response hidden inline"><?php echo $_SESSION['form_response']; ?></div>
				<div class="form_item">
					<div class="size1 required inline give_break10">
						Hotel Name
					</div><!--
					--><div class="size3 inline">
						<input type="text" name="name" value="<?php echo $data['name']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="size1 inline give_break10">
						Address
					</div><!--
					--><div class="size5 inline">
						<input type="text" name="address" value="<?php echo $data['address']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="size1 inline give_break10">
						Phone No.
					</div><!--
					--><div class="size3 inline">
						<input type="text" name="phone_number" value="<?php echo $data['phone_number']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="size1 inline give_break10">
						GPS
					</div><!--
					--><div class="size3 inline">
						<input type="text" name="gps" value="<?php echo $data['gps']; ?>" class="input" />
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

<div class="clear"></div>
<?php
	require($fullRoot.'include/html-bottom-admin.php');
?>