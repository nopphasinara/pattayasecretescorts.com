<?php
	$mw->checkHost();
	
	setcookie('_uid', '', time() - 3600, $basePath);
	setcookie('_ig', '', time() - 3600, $basePath);
	setcookie('_rnd', '', time() - 3600, $basePath);
	
	die('<script>window.location = \''.$adminUrl.'\';</script>');
?>