<?php
	$mw->checkHost();
	$xss = $mw->query($_GET, 'xss');
	
	$html = '';
	if(empty($xss['profile_id']) || empty($xss['target'])) {
		$html = '<img src="'.$fullUrl.'image-profile/thumbnail/empty.jpg" width="152" alt="empty.jpg" />';
	} else {
		$html = '<img src="'.$fullUrl.'image-profile/thumbnail/'.$mw->getThumbnail($xss['profile_id']).'" width="152" alt="'.$mw->getThumbnail($xss['profile_id']).'" />';
	}
	
	echo $html;
?>