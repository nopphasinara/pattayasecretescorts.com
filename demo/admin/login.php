<?php
	if(isset($_COOKIE['_uid']) && !empty($_COOKIE['_uid']) && isset($_COOKIE['_uis']) && !empty($_COOKIE['_uis']) && isset($_COOKIE['_uir']) && !empty($_COOKIE['_uir'])) {
		header('Location: '.$adminUrl.'dashboard');
		die();
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
		<div class="header oswald">SIGN IN</div>
		<div class="form">
			<form action="<?php echo $adminUrl.'home-action&method=post'; ?>" method="post" id="form_login" use-ajax="yes">
				<input type="hidden" name="mode" value="login" />
				<input type="hidden" name="form_id" value="form_login" />
				<div class="form_response hidden inline"><?php echo $_SESSION['form_response']; ?></div>
				<div class="form_item">
					<input type="text" id="email" name="email" placeholder="Email address" class="input required" false-empty="Please put your email address." />
				</div>
				<div class="form_item">
					<div class="input_response" input-name="email"></div>
				</div>
				<div class="form_item">
					<input type="password" id="password" name="password" placeholder="Password" class="input required" false-empty="Please put your password." />
				</div>
				<div class="form_item">
					<div class="input_response" input-name="password"></div>
				</div>
				<div class="form_item">
					<div class="button_submit one"><a href="javascript:;" title="Sign In" data-type="submit" data-id="form_login"><strong>SIGN IN</strong></a></div>
				</div>
				<div class="form_item last">
					<div class="inline give_break10"><a href="<?php echo $adminUrl.'forgot-password'; ?>" title="Forgot password? Click here" class="forgot_password">Forgot password? Click here</a></div>
				</div>
			</form>
		</div>
	</div>
</div>
<!--/e_login-->
<?php
	require($fullRoot.'include/html-bottom-admin.php');
?>