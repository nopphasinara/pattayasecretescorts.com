<?php
	//$mw->checkHost();
	$xss = $mw->query($_GET, 'xss');
	
	if(empty($xss['url']) || empty($xss['banner_id'])) {
		die('Achtung! System nicht mehr funktioniert aufgrund ungültiger Konfig.');
	}
	
	$db->connect();
	$banner = $db->select(" select * from ".$prefix."banners where id = '".$xss['banner_id']."' and status = 'enable' ");
	$db->close();
	if(!$banner || $banner['0']['id'] != $xss['banner_id']) {
		$mw->notfound();
	}
	
	$banner = $banner['0'];
	
	$db->connect();
	$db->command(" update ".$prefix."banners set _click = _click + 1 where id = '".$banner['id']."' ");
	$db->close();
	
	sleep(1);
	
	header('Location: '.$banner['link']);
	die();
?>