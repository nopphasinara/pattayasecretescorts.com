<?php
	require('../include/admin.php');
	
	$user_data = $mw->checkLogin(array('admin'));
	
	$xss = $mw->query($_GET, 'xss');
	
	# Generate order and sort item
	$xss['order_by'] = (empty($xss['order_by'])) ? 'date_time' : $xss['order_by'];
	$xss['sort_by'] = (empty($xss['sort_by'])) ? 'desc' : $xss['sort_by'];
	$order_by = " order by date_time desc ";
	$order_by_url = '&order_by='.$xss['order_by'].'&sort_by='.$xss['sort_by'].'';
	if(!empty($xss['order_by']) || !empty($xss['sort_by'])) {
		$order_by = " order by ".$xss['order_by']." ".$xss['sort_by']." ";
	}
	$next_sort = (empty($xss['sort_by']) || $xss['sort_by'] == 'desc') ? 'asc' : 'desc';
	
	# Generate query
	$keyword_url = '&keyword=';
	if(!empty($xss['keyword'])) {
		$keyword_url = '&keyword='.$xss['keyword'];
		$keyword = " and (name like '%".$xss['keyword']."%') ";
	}
	
	$new_url = '&new=';
	if(!empty($xss['new'])) {
		$new_url = '&new='.$xss['new'];
		$new = " and _read != 'yes' ";
	}
	
	$script_link = $adminUrl.'reviews.php?form_id='.$xss['form_id'].$keyword_url.$new_url;
	
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
			<!--e_search-->
			<div id="e_search">
				<h3 class="title oswald text_white give_space15 give_border">Search Tool</h3>
				<form action="<?php echo $adminUrl.'reviews.php'; ?>" method="get" id="form_search">
					<div class="form_response hidden inline"><?php echo $_SESSION['form_response']; ?></div>
					<div class="form_item">
						<div class="size1 give_break10 inline">
							Keywords
						</div><!--
						--><div class="size2 give_break10 inline">
							<input type="text" name="keyword" placeholder="keywords" value="<?php echo $xss['keyword']; ?>" class="input" />
						</div><!--
						--><div class="size1 inline">
							<div class="button_submit three"><a href="javascript:;" title="Search" data-type="submit" data-id="form_search"><strong>Search</strong></a></div>
						</div>
					</div>
					<div class="form_item last">
						<div class="size1 inline give_break10">
							&nbsp;
						</div><!--
						--><div class="size2 inline">
							<input type="checkbox" name="new" value="yes" <?php if($xss['new'] == 'yes') { echo 'checked'; } ?> /> Show only new records
						</div>
					</div>
				</form>
			</div>
			<!--/e_search-->
		</div>
		<!--/e_tool-->
		
		<!--data_list-->
		<div class="data_list">
			<?php
				# Count item
				$db->connect();
				$total_record = $db->select(" select count(id) as num from ".$prefix."reviews where id != '' ".$keyword.$new." ");
				$db->close();
				if(!$total_record || empty($total_record['0']['num'])) {
					echo $mw->createTableList('header');
					echo '<tr class="list_item"><td colspan="4" class="text_center">No result founds.</td></tr>';
					echo $mw->createTableList('footer');
				} else {
					$limit = 10;
					$total_record = $total_record['0']['num'];
					$total_page = ceil($total_record / $limit);

					$cur_page = (empty($xss['page']) || $xss['page'] < 1) ? 1 : $xss['page'];
					$cur_page = ($cur_page > $total_page) ? $total_page : $cur_page;

					$start_id = ($cur_page - 1) * $limit;
					$end_id = (($start_id + $limit) > $total_record) ? ($total_record - $start_id) : $limit;

					$db->report = true;
					$db->connect();
					$data = $db->select(" select * from ".$prefix."reviews where id != '' ".$keyword.$new." ".$order_by." limit ".$start_id.", ".$end_id." ");
					$db->close();
					if(!$data) {
						echo $mw->createTableList('header');
						echo '<tr class="list_item"><td colspan="4" class="text_center">No result founds.</td></tr>';
						echo $mw->createTableList('footer');
					} else {
						require($fullRoot.'include/page-'.$sysLang.'.php');
						?>
						<form action="<?php echo $adminUrl.'reviews-action.php'; ?>" method="post" id="form_delete">
							<input type="hidden" name="mode" value="delete" />
							<input type="hidden" name="form_id" value="form_delete" />
							<div class="form_response hidden inline"><?php echo $_SESSION['form_response']; ?></div>
							<!--e_subtool-->
							<div class="e_subtool give_space15">
								<div class="delete_box">
									<div class="button_submit two inline"><a href="javascript:;" title="Delete Selected Records" data-type="submit" data-id="form_delete"><strong>Delete Selected Records</strong></a></div>
								</div>
								<div class="page_box text_right">
									<?php echo $pg->genLink(); ?>
								</div>
								<div class="clear"></div>
							</div>
							<!--/e_subtool-->
							<?php
								echo $mw->createTableList('header');

								$total_item = count($data);
								for($i = 0; $i < $total_item; $i++) {
									$profile = $mw->getRecord($prefix.'profiles', $data[$i]['profile_id'], 'id, nickname');
									$nickname = (empty($profile['nickname'])) ? '-' : $profile['nickname'];
									$new_item = ($data[$i]['_read'] == 'no') ? '<div class="new_item inline radius12">New</div>' : '';
									echo '<tr class="list_item">
										<td>'.$mw->lockedData($data[$i]['id'], $data[$i]['locked']).'</td>
										<td class="details">
											<div class="name give_space5">
												'.$data[$i]['name'].$new_item.'
											</div>
											<div class="info give_space5">
												Review on '.$nickname.'
											</div>
											<div class="clear"></div>
											<div class="updated">'.$mw->lastUpdate($data[$i]['update_time'], $data[$i]['update_id']).'</div>
											<div class="button_edit">
												<a href="'.$adminUrl.'reviews-form.php?mode=edit&id='.$data[$i]['id'].'&referer='.urlencode($absUri['1']).'">Edit</a>
											</div>
										</td>
										<td class="status '.$array_status_color[$data[$i]['status']].'">'.$array_status[$data[$i]['status']].'</td>
										<td class="last">'.date('d M Y', strtotime($data[$i]['date_time'])).'<br />'.date('H:i:s', strtotime($data[$i]['date_time'])).'</td>
									</tr>';
								}

								echo $mw->createTableList('footer');
							?>
							<!--e_subtool-->
							<div class="e_subtool giveup_space15">
								<div class="page_box text_right">
									<?php echo $pg->genLink(); ?>
								</div>
								<div class="clear"></div>
							</div>
							<!--/e_subtool-->
						</form>
						<?php
					}
				}
			?>
		</div>
		<!--/data_list-->
	</div>
</div>
<!--/e_content-->

<div class="clear"></div>
<?php
	require($fullRoot.'include/html-bottom-admin.php');
?>