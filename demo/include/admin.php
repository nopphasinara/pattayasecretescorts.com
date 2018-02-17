<?php
	ob_start();
	
	require('class.database.php');
	require('class.config.php');	
	require('class.passhash.php');
	require('class.php');
	require('global.php');
	require('config-en.php');
	
	$mw->humanCheck();
	$mw->checkSystem();
?>