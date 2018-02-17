<?php
	require('../include/admin.php');
	
	if(!empty($_SESSION['xss'])) {
		$rxss = $mw->query($_SESSION['xss'], 'rxss');
	}
	
	# Hack body class
	$body_class = 'login';
	
	# Clear user and login $_COOKIE here
	setcookie('_uid', '', time() - 3600, $basePath);
	setcookie('_uis', '', time() - 3600, $basePath);
	setcookie('_uir', '', time() - 3600, $basePath);
	
	require($fullRoot.'include/html-top-admin.php');
?>
<!--e_login-->
<div id="e_login">
	<div class="content_res">
		<div class="header oswald">FORGOT PASSWORD</div>
		<div class="form">
			<form action="<?php echo $adminUrl.'index-action.php'; ?>" method="post" id="form_default">
				<input type="hidden" name="mode" value="reset" />
				<input type="hidden" name="form_id" value="form_default" />
				<div class="form_response hidden inline"><?php echo $_SESSION['form_response']; ?></div>
				<div class="form_item">
					<input type="text" name="email" placeholder="Email address" value="<?php echo $rxss['email']; ?>" class="input required" />
				</div>
				<div class="form_item">
					<div class="input_response" input-name="email"></div>
				</div>
				<div class="form_item">
					<div class="button_submit one"><a href="javascript:;" title="Reset" data-type="submit" data-id="form_default"><strong>Reset</strong></a></div>
				</div>
				<div class="form_item last">
					<div class="inline give_break10"><a href="<?php echo $adminUrl.'index.php'; ?>" title="I already know my password" class="forgot_password">&laquo; I already know my password</a></div>
				</div>
			</form>
		</div>
	</div>
</div>
<!--/e_login-->
<?php
	require($fullRoot.'include/html-bottom-admin.php');
?>