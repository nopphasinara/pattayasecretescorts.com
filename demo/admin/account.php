<?php
	require('../include/admin.php');
	
	$user_data = $mw->checkLogin();
	
	require($fullRoot.'include/html-top-admin.php');
?>
<!--e_left-->
<?php require($fullRoot.'include/e-left-admin.php'); ?>
<!--/e_left-->

<!--e_content-->
<div id="e_content">
	<div class="content_res">
		<h1 class="title oswald text_yellow give_space30">Account Setting</h1>
		
		<!--e_tool-->
		<div id="e_tool">
			<form action="<?php echo $adminUrl.'account-action.php'; ?>" method="post" id="form_default">
				<input type="hidden" name="mode" value="edit" />
				<input type="hidden" name="form_id" value="form_default" />
				<input type="hidden" name="old_email" value="<?php echo $user_data['email']; ?>" />
				<input type="hidden" name="old_name" value="<?php echo $user_data['name']; ?>" />
				<input type="hidden" name="referer" value="<?php echo urldecode($xss['referer']); ?>" />
				<div class="form_response hidden inline"><?php echo $_SESSION['form_response']; ?></div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Name
					</div><!--
					--><div class="size2 give_break10 inline">
						<input type="text" name="name" value="<?php echo $user_data['name']; ?>" class="input" />
					</div><!--
					--><div class="size1 required give_break10 text_right inline">
						Email
					</div><!--
					--><div class="size2 inline">
						<input type="text" name="email" value="<?php echo $user_data['email']; ?>" class="input" />
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
					<div class="size1 give_break10 inline">
						&nbsp;
					</div><!--
					--><div class="size2 give_break10 inline">
						<input type="password" name="current_password" class="input" />
					</div><!--
					--><div class="size1 give_break10 inline">
						&nbsp;
					</div><!--
					--><div class="size2 inline">
						<div class="button_submit two"><a href="javascript:;" title="Save" data-type="submit" data-id="form_default"><strong>Save</strong></a></div>
					</div>
				</div>
				<div class="form_item last">
					<div class="size1 give_break10 inline">
						&nbsp;
					</div><!--
					--><div class="size3 text_hint give_break10 inline">
						* Type current password to confirm change.
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