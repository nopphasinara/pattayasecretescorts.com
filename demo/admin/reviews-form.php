<?php
	require('../include/admin.php');
	
	$user_data = $mw->checkLogin(array('admin'));
	
	$rxss = $_SESSION['xss'];
	$xss = $mw->query($_GET, 'xss');
	
	$xss['mode'] = (empty($xss['mode'])) ? 'add' : $xss['mode'];
	
	$data = $rxss;
	if(!empty($xss['id'])) {
		$db->connect();
		$data = $db->select(" select * from ".$prefix."reviews where id = '".$xss['id']."' ");
		$db->close();
		if(!$data || $data['0']['id'] != $xss['id']) {
			$mw->notfound();
		}
		
		$data = $data['0'];
		
		if($data['_read'] != 'yes') {
			$mw->saveLog('reviews', $data['id']);

			$db->connect();
			$db->command(" update ".$prefix."reviews set _read = 'yes' where id = '".$data['id']."' ");
			$db->close();
		}
	}
	
	$menu['reviews'] = 'active';
	
	require($fullRoot.'include/html-top-admin.php');
?>
<!--e_left-->
<?php require($fullRoot.'include/e-left-admin.php'); ?>
<!--/e_left-->

<!--e_content-->
<div id="e_content">
	<div class="content_res">
		<h1 class="title oswald text_yellow give_space30">Review Management</h1>
		
		<!--e_tool-->
		<div id="e_tool">
			<?php
				if($xss['mode'] == 'add') {
					echo '<h3 class="title oswald text_white give_space15 give_border">Add New Review</h3>';
				} else if($xss['mode'] == 'edit') {
					echo '<h3 class="title oswald text_white give_space15 give_border">Edit Review - '.$data['name'].'</h3>';
				}
			?>
			<form action="<?php echo $adminUrl.'reviews-action.php'; ?>" method="post" id="form_default" enctype="multipart/form-data">
				<input type="hidden" name="mode" value="<?php echo $xss['mode']; ?>" />
				<input type="hidden" name="form_id" value="form_default" />
				<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
				<input type="hidden" name="referer" value="<?php echo urldecode($xss['referer']); ?>" />
				<div class="form_response hidden inline"><?php echo $_SESSION['form_response']; ?></div>
				<div class="form_item">
					<div class="size1 required inline give_break10">
						Profile
					</div><!--
					--><div class="size1 inline">
						<select name="profile_id" class="input">
							<option value=""></option>
							<?php
								$db->connect();
								$profile = $db->select(" select * from ".$prefix."profiles order by nickname asc ");
								$db->close();
								if(!$profile) {
									
								} else {
									$total_item = count($profile);
									for($i = 0; $i < $total_item; $i++) {
										$selected = ($data['profile_id'] == $profile[$i]['id']) ? 'selected' : '';
										echo '<option value="'.$profile[$i]['id'].'" '.$selected.'>'.$profile[$i]['nickname'].'</option>';
									}
								}
							?>
						</select>
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required inline give_break10">
						Name
					</div><!--
					--><div class="size2 inline">
						<input type="text" name="name" value="<?php echo $data['name']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="size1 inline give_break10">
						Email
					</div><!--
					--><div class="size2 inline">
						<input type="text" name="email" value="<?php echo $data['email']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required inline give_break10">
						Comments
					</div><!--
					--><div class="size5 inline">
						<textarea name="text" rows="5" class="input"><?php echo strip_tags(stripcslashes($data['text'])); ?></textarea>
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Rate
					</div><!--
					--><div class="size2 inline">
						<select name="rate" class="input">
							<?php
								for($i = 1; $i <= 10; $i++) {
									$selected = ($data['rate'] == $i) ? 'selected' : '';
									echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
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

<div class="clear"></div>
<?php
	require($fullRoot.'include/html-bottom-admin.php');
?>