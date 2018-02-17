<?php
	$document_root = $_SERVER['DOCUMENT_ROOT'];
	$script_name = explode('/', $_SERVER['SCRIPT_NAME']);
	$script_name = $script_name['1'];
	$path = $document_root.'/'.$script_name.'/';
	(header("HTTP/1.1 403 Forbidden")&require($path.'403.php'));
	die();
?>