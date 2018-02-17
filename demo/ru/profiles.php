<?php
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
	
	$id_all = '';
	$option = '';
	
	if(!empty($xss['offers']) || !empty($xss['receives'])) {
		$option = " and id = 'xxx' ";
	}
	
	$id_by_offers = '';
	$offers_url = '&offers=';
	if(!empty($xss['offers'])) {
		$offers_url = '';
		foreach($xss['offers'] as $key => $value) {
			$offers_url .= '&offers%5B%5D='.$value;
			
			$db->connect();
			$check = $db->select(" select profile_id from ".$prefix."profiles_service where service_id = '".$value."' and service_type = 'offers' ");
			$db->close();
			if(!$check) {
				
			} else {
				$total_item = count($check);
				for($i = 0; $i < $total_item; $i++) {
					if(!in_array($check[$i]['profile_id'], $id_by_offers)) {
						$id_by_offers[] = $check[$i]['profile_id'];
					}
				}
			}
		}
		
		if(!empty($id_by_offers)) {
			foreach($id_by_offers as $key => $value) {
				if(!in_array($value, $id_all)) {
					$id_all[] = $value;
				}
			}
		}
		//$offers = " and (nickname like '%".$xss['offers']."%') ";
	}
	
	$id_by_receives = '';
	$receives_url = '&receives=';
	if(!empty($xss['receives'])) {
		$receives_url = '';
		foreach($xss['receives'] as $key => $value) {
			$receives_url .= '&receives%5B%5D='.$value;
			
			$db->connect();
			$check = $db->select(" select profile_id from ".$prefix."profiles_service where service_id = '".$value."' and service_type = 'receives' ");
			$db->close();
			if(!$check) {

			} else {
				$total_item = count($check);
				for($i = 0; $i < $total_item; $i++) {
					if(!in_array($check[$i]['profile_id'], $id_by_receives)) {
						$id_by_receives[] = $check[$i]['profile_id'];
					}
				}
			}
		}
		
		if(!empty($id_by_receives)) {
			foreach($id_by_receives as $key => $value) {
				if(!in_array($value, $id_all)) {
					$id_all[] = $value;
				}
			}
		}
		//$receives = " and (nickname like '%".$xss['receives']."%') ";
	}
	
	if(!empty($id_all)) {
		$option = " and id in (".implode(',', $id_all).") ";
	}
	
	$option_hidden = 'hidden';
	if(!empty($xss['offers']) || !empty($xss['receives'])) {
		$option_hidden = '';
	}
	
	$script_link = $fullUrl.$sysLang.'/profiles.html?form_id='.$xss['form_id'].$keyword_url.$receives_url.$offers_url;
	
	require($fullRoot.'include/html-top.php');
?>
<!--e_top-->
<?php require($fullRoot.'include/e-top-'.$sysLang.'.php'); ?>
<!--/e_top-->

<!--e_menu-->
<?php require($fullRoot.'include/e-menu-'.$sysLang.'.php'); ?>
<!--/e_menu-->

<!--e_slide-->
<?php require($fullRoot.'include/e-slide-'.$sysLang.'.php'); ?>
<!--/e_slide-->

<!--e_wrapper-->
<div id="e_wrapper">
	<div class="content_res">
		<!--e_left-->
		<?php require($fullRoot.'include/e-left-'.$sysLang.'.php'); ?>
		<!--/e_left-->

		<!--e_content-->
		<div id="e_content">
			<h1 class="title text_yellow give_space10"><strong>ГАЛЕРЕЯ ТАЙСКИХ ДЕВУШЕК</strong></h1>
			
			<!--e_search-->
			<?php require($fullRoot.'include/e-search-'.$sysLang.'.php'); ?>
			<!--/e_search-->
			
			<?php
				# Count item
				$db->connect();
				$total_record = $db->select(" select count(id) as num from ".$prefix."profiles where id != '' and status = 'enable' ".$keyword.$option." ");
				$db->close();
				if(!$total_record || empty($total_record['0']['num'])) {
					echo 'No results found.';
				} else {
					$limit = 12;
					$total_record = $total_record['0']['num'];
					$total_page = ceil($total_record / $limit);

					$cur_page = (empty($xss['page']) || $xss['page'] < 1) ? 1 : $xss['page'];
					$cur_page = ($cur_page > $total_page) ? $total_page : $cur_page;

					$start_id = ($cur_page - 1) * $limit;
					$end_id = (($start_id + $limit) > $total_record) ? ($total_record - $start_id) : $limit;

					$db->report = true;
					$db->connect();
					$data = $db->select(" select * from ".$prefix."profiles where id != '' and status = 'enable' ".$keyword.$option." ".$order_by." limit ".$start_id.", ".$end_id." ");
					$db->close();
					if(!$data) {
						echo 'No results found.';
					} else {
						require($fullRoot.'include/page-'.$sysLang.'.php');
						?>
						<div class="page_box text_right">
							<?php echo $pg->genLink(); ?>
						</div>
						<div>&nbsp;</div>
						<div class="list_profiles">
							<?php
								$total_item = count($data);
								$ceil_row = ceil($total_item / 3);
								$row = 0;
								$n = 1;
								for($i = 0; $i < $total_item; $i++) {
									$last = ($n == 3) ? 'last' : '';
									$row = ($n == 1) ? ($row + 1) : $row;
									$last_row = ($row == $ceil_row) ? 'last_row' : '';
									$new_label = ($data[$i]['_new'] == 'yes') ? '<div class="label_item inline"><img src="'.$fullUrl.'image/icon-new.png" width="48" alt="icon-new.png" /></div>' : '';
									$hot_label = ($data[$i]['_hot'] == 'yes') ? '<div class="label_item inline"><img src="'.$fullUrl.'image/icon-hot.png" width="48" alt="icon-hot.png" /></div>' : '';
									
									echo '<div class="item inline '.$last.' '.$last_row.'">
										<div class="thumbnail">
											<a href="'.$fullUrl.$sysLang.'/profile-details/'.$data[$i]['id'].'/'.$mw->mod($data[$i]['nickname']).'.html" title="'.$data[$i]['nickname'].'"><img src="'.$fullUrl.'image-profile/thumbnail/'.$mw->getThumbnail($data[$i]['id']).'" width="173" alt="'.$data[$i]['nickname'].'" /></a>
										</div>
										<div class="name oswald">
											<a href="'.$fullUrl.$sysLang.'/profile-details/'.$data[$i]['id'].'/'.$mw->mod($data[$i]['nickname']).'.html" title="'.$data[$i]['nickname'].'">'.$data[$i]['nickname'].'</a>
										</div>
										<div class="label">
											'.$new_label.$hot_label.'
										</div>
									</div>';
									$n = $n + 1;
									$n = ($n > 3) ? 1 : $n;
								}
							?>
						</div>
						<div>&nbsp;</div>
						<div class="page_box text_right">
							<?php echo $pg->genLink(); ?>
						</div>
						<?php
					}
				}
			?>
			
			<?php require($fullRoot.'include/button-booking.php'); ?>
		</div>
		<!--/e_content-->

		<!--e_right-->
		<?php require($fullRoot.'include/e-right-'.$sysLang.'.php'); ?>
		<!--/e_right-->

		<div class="clear"></div>
	</div>
</div>
<!--/e_wrapper-->

<!--e_footer-->
<?php require($fullRoot.'include/e-footer-'.$sysLang.'.php'); ?>
<!--/e_footer-->
<?php
	require($fullRoot.'include/html-bottom.php');
?>