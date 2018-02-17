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
		$keyword = " and (nickname like '%".$xss['keyword']."%') ";
	}
	
	$script_link = $adminUrl.'profiles.php?form_id='.$xss['form_id'].$keyword_url;
	
	$menu['profiles'] = 'active';
	
	require($fullRoot.'include/html-top-admin.php');
?>
<!--e_left-->
<?php require($fullRoot.'include/e-left-admin.php'); ?>
<!--/e_left-->

<!--e_content-->
<div id="e_content">
	<div class="content_res">
		<h1 class="title oswald text_yellow give_space30">Profile Management</h1>
		
		<!--e_tool-->
		<div id="e_tool">
			<!--e_search-->
			<div id="e_search">
				<h3 class="title oswald text_white give_space15 give_border">Search Tool</h3>
				<form action="<?php echo $adminUrl.'profiles.php'; ?>" method="get" id="form_search">
					<div class="form_response hidden inline"><?php echo $_SESSION['form_response']; ?></div>
					<div class="form_item last">
						<div class="size1 give_break10 inline">
							Keywords
						</div><!--
						--><div class="size2 give_break10 inline">
							<input type="text" name="keyword" placeholder="nickname" value="<?php echo $xss['keyword']; ?>" class="input" />
						</div><!--
						--><div class="size1 inline">
							<div class="button_submit three"><a href="javascript:;" title="Search" data-type="submit" data-id="form_search"><strong>Search</strong></a></div>
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
				$total_record = $db->select(" select count(id) as num from ".$prefix."profiles where id != '' ".$keyword." ");
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

					$db->connect();
					$data = $db->select(" select id, nickname, weight, height, shoe_size, locked, status, date_time, _new, _hot, availability, _view, _booking, _review, update_time, update_id from ".$prefix."profiles where id != '' ".$keyword." ".$order_by." limit ".$start_id.", ".$end_id." ");
					$db->close();
					if(!$data) {
						echo $mw->createTableList('header');
						echo '<tr class="list_item"><td colspan="4" class="text_center">No result founds.</td></tr>';
						echo $mw->createTableList('footer');
					} else {
						require($fullRoot.'include/page-'.$sysLang.'.php');
						?>
						<form action="<?php echo $adminUrl.'profiles-action.php'; ?>" method="post" id="form_delete">
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
								echo $mw->createTableList('header', array('nickname', 'status', 'date_time'));

								$total_item = count($data);
								for($i = 0; $i < $total_item; $i++) {
									$data[$i]['height'] = (empty($data[$i]['height'])) ? '-' : $data[$i]['height'];
									$data[$i]['weight'] = (empty($data[$i]['weight'])) ? '-' : $data[$i]['weight'];
									$data[$i]['shoe_size'] = (empty($data[$i]['shoe_size'])) ? '-' : $data[$i]['shoe_size'];
									
									$tag_new = ($data[$i]['_new'] == 'yes') ? '' : 'hidden';
									$tag_hot = ($data[$i]['_hot'] == 'yes') ? '' : 'hidden';
									
									echo '<tr class="list_item">
										<td>'.$mw->lockedData($data[$i]['id'], $data[$i]['locked']).'</td>
										<td class="details">
											<div class="thumbnail">
												<img src="'.$fullUrl.'image-profile/thumbnail/'.$mw->getThumbnail($data[$i]['id']).'" width="121" alt="" />
											</div>
											<div class="all_info">
												<div class="name give_space5">
													'.$data[$i]['nickname'].' (Rating '.$mw->getRating($data[$i]['id']).')
												</div>
												<div class="info give_space5">
													Height: '.$data[$i]['height'].' cm | Weight: '.$data[$i]['weight'].' kg | Shoe Size: '.$data[$i]['shoe_size'].' eu
												</div>
												<div class="clear"></div>
												<div class="updated">'.$mw->lastUpdate($data[$i]['update_time'], $data[$i]['update_id']).'</div>
												<div class="tag_label radius12 new '.$tag_new.' inline">New</div><!--
												--><div class="tag_label radius12 hot '.$tag_hot.' inline">Hot</div><!--
												--><div class="tag_label radius12 '.$data[$i]['availability'].' inline">'.$array_availability[$data[$i]['availability']].'</div>
											</div>
											<div class="clear"></div>
											<div class="button_edit">
												<a href="'.$adminUrl.'profiles-form.php?mode=edit&id='.$data[$i]['id'].'&referer='.urlencode($absUri['1']).'">Edit</a>
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
<script>
	$('#select_availability').bind('change', function(){
		var value = $(this).val();
		
		$('.availability_hidden').addClass('hidden');
		$('#input_available_date').attr('value', '');
		$('#input_availability_note').val('');
		
		if(value == 'unavailable') {
			$('.availability_hidden').removeClass('hidden');
		}
	});
	
	$('#place_file .button_add a').live('click', function(){
		$('#drag_area').append('<div class="item"><input type="file" name="file[]" /><input type="hidden" name="log_id[]" value="" class="log_id" /><a href="javascript:;" class="button_remove" data-id="">&nbsp;</a></div>');
	});
	
	$('#place_file a.button_remove').live('click', function(){
		$(this).parent('.item').children('.size2').children('.log_id').attr('name', 'delete_id[]').clone().appendTo('#drop_area');
		$(this).parent('.item').children('.size2').children('.log_file').attr('name', 'delete_file[]').clone().appendTo('#drop_area');
		$(this).parent('.item').remove();
	});
</script>

<div class="clear"></div>
<?php
	require($fullRoot.'include/html-bottom-admin.php');
?>