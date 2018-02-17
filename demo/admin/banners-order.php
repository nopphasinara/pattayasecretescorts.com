<?php
	require('../include/admin.php');
	
	$user_data = $mw->checkLogin(array('admin'));
	
	$rxss = $_SESSION['xss'];
	$xss = $mw->query($_GET, 'xss');
	
	$xss['mode'] = (empty($xss['mode'])) ? 'add' : $xss['mode'];
	
	$db->connect();
	$data = $db->select(" select id, name, banner_type, banner_side, _order, status from ".$prefix."banners order by _order asc ");
	$db->close();
	if(!$data) {
		$mw->returnError('form_delete', $adminUrl.'banners.php', 'No have record, please try add some.');
	}
	
	$menu['banners'] = 'active';
	
	$script['jquery_ui'] = 'yes';
	
	require($fullRoot.'include/html-top-admin.php');
?>
<!--e_left-->
<?php require($fullRoot.'include/e-left-admin.php'); ?>
<!--/e_left-->

<!--e_content-->
<div id="e_content">
	<div class="content_res">
		<h1 class="title oswald text_yellow give_space30">Banner Management</h1>
		
		<!--e_tool-->
		<div id="e_tool">
			<h3 class="title oswald text_white give_space15 give_border">Re-Order Banners</h3>
			<form action="<?php echo $adminUrl.'banners-action.php'; ?>" method="post" id="form_default" enctype="multipart/form-data">
				<input type="hidden" name="mode" value="order" />
				<input type="hidden" name="form_id" value="form_default" />
				<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
				<input type="hidden" name="referer" value="<?php echo urldecode($xss['referer']); ?>" />
				<div class="form_response hidden inline"><?php echo $_SESSION['form_response']; ?></div>
				<div class="form_item">
					<div class="give_space5"><strong>Left Side</strong></div>
					<div class="drag_area">
						<?php
							$total_item = count($data);
							for($i = 0; $i < $total_item; $i++) {
								if($data[$i]['banner_side'] == 'left') {
									$change_style = ($data[$i]['status'] == 'disabled') ? ' style="background-color: #b71300;" ' : '';
									echo '<div class="item" '.$change_style.'>
										'.$data[$i]['name'].' ['.$array_banner_type[$data[$i]['banner_type']].']
										<input type="hidden" name="log_id[]" value="'.$data[$i]['id'].'" />
									</div>';
								}
							}
						?>
					</div>
				</div>
				<div>&nbsp;</div>
				<div class="form_item">
					<div class="give_space5"><strong>Right Side</strong></div>
					<div class="drag_area">
						<?php
							$total_item = count($data);
							for($i = 0; $i < $total_item; $i++) {
								if($data[$i]['banner_side'] == 'right') {
									$change_style = ($data[$i]['status'] == 'disabled') ? ' style="background-color: #b71300;" ' : '';
									echo '<div class="item" '.$change_style.'>
										'.$data[$i]['name'].' ['.$array_banner_type[$data[$i]['banner_type']].']
										<input type="hidden" name="log_id[]" value="'.$data[$i]['id'].'" />
									</div>';
								}
							}
						?>
					</div>
				</div>
				<div class="form_item">
					<div class="size6 text_hint inline">
						Hint: click on each tab and drag to re-order it.
					</div>
				</div>
				<div class="form_item">
					<div class="size6 text_hint inline">
						Remark: [RED TAB] Is mean this record has been disabled will not visible or show on front-end.
					</div>
				</div>
				<div class="form_item last">
					<div class="size4 give_break10 inline">
						&nbsp;
					</div><!--
					--><div class="size2 inline">
						<div class="button_submit two"><a href="javascript:;" title="Save" data-type="submit" data-id="form_default"><strong>Save</strong></a></div>
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