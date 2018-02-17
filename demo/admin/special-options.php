<?php
	$user_data = $mw->checkLogin(array('admin', 'power_user'));
	$xss = $mw->query($_GET, 'xss');
	
	$mode = 'add';
	
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
		$keyword = " and (name like '%".$xss['keyword']."%' or email like '%".$xss['keyword']."%') ";
	}
	
	if(!empty($xss['id'])) {
		$db->connect();
		$load_data = $db->select(" select * from ".$prefix."users where id = '".$xss['id']."' ");
		$db->close();
		if(!$load_data || $load_data['0']['id'] != $xss['id']) {
			$mw->notfound();
		}
		
		$load_data = $load_data['0'];
		
		$mode = 'edit';
	}
	
	$script_link = $adminUrl.'users&method='.$xss['method'].'&mode='.$xss['mode'].'&form_id='.$xss['form_id'].$keyword_url;
	
	require($fullRoot.'include/html-top-admin.php');
?>
<!--e_left-->
<?php require($fullRoot.'include/e-left-admin.php'); ?>
<!--/e_left-->

<!--e_content-->
<div id="e_content">
	<div class="content_res">
		<h1 class="title oswald text_yellow give_space30">User Management</h1>
		
		<!--e_tool-->
		<div id="e_tool">
			<h3 class="title oswald text_white give_space15">Quick Tools</h3>
			<form action="<?php echo $adminUrl.'users-action&method=post'; ?>" method="post" id="form_default" use-ajax="yes">
				<input type="hidden" name="mode" value="<?php echo $mode; ?>" />
				<input type="hidden" name="form_id" value="form_default" />
				<input type="hidden" name="id" value="<?php echo $load_data['id']; ?>" />
				<input type="hidden" name="old_email" value="<?php echo $load_data['email']; ?>" />
				<input type="hidden" name="old_name" value="<?php echo $load_data['name']; ?>" />
				<input type="hidden" name="referer" value="<?php echo $referer; ?>" />
				<div class="form_response hidden inline"><?php echo $_SESSION['form_response']; ?></div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Name
					</div><!--
					--><div class="size2 give_break10 inline">
						<input type="text" name="name" value="<?php echo $load_data['name']; ?>" class="input" />
					</div><!--
					--><div class="size1 required give_break10 text_right inline">
						Email
					</div><!--
					--><div class="size2 inline">
						<input type="text" name="email" value="<?php echo $load_data['email']; ?>" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Password
					</div><!--
					--><div class="size2 give_break10 inline">
						<input type="password" name="password" class="input" />
					</div><!--
					--><div class="size1 required give_break10 text_right inline">
						Confirm Password
					</div><!--
					--><div class="size2 inline">
						<input type="password" name="confirm_password" class="input" />
					</div>
				</div>
				<div class="form_item">
					<div class="size1 required give_break10 inline">
						Level
					</div><!--
					--><div class="size2 give_break10 inline">
						<select name="level" class="input">
							<option value=""></option>
							<?php
								foreach($array_level as $key => $value) {
									$selected = ($key == $load_data['level']) ? 'selected' : '';
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
					</div><!--
					--><div class="size1 give_break10 inline">
						&nbsp;
					</div><!--
					--><div class="size2 inline">
						<?php
							if($user_data['level'] == 'admin' || $user_data['level'] == 'system') {
								$checked = (strtolower($load_data['locked']) == 'yes') ? 'checked' : '';
								echo '<input type="checkbox" name="locked" value="yes" '.$checked.' /> Lock this record';
								$checked = '';
							}
						?>
					</div>
				</div>
				<div class="form_item last">
					<div class="size1 required give_break10 inline">
						Status
					</div><!--
					--><div class="size2 give_break10 inline">
						<select name="status" class="input">
							<option value=""></option>
							<?php
								foreach($array_status as $key => $value) {
									$selected = ($key == $load_data['status']) ? 'selected' : '';
									echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
								}
							?>
						</select>
					</div><!--
					--><div class="size1 give_break10 inline">
						&nbsp;
					</div><!--
					--><div class="size1 give_break10 inline">
						<div class="button_submit two"><a href="javascript:;" title="Save" data-type="submit" data-id="form_default"><strong>Save</strong></a></div>
					</div><!--
					--><div class="size1 inline">
						&nbsp;
					</div>
				</div>
			</form>
			
			<div class="give_space20 give_border"></div>
			
			<!--e_search-->
			<div id="e_search">
				<form action="<?php echo $adminUrl; ?>" method="get" id="form_search">
					<input type="hidden" name="page_id" value="users" />
					<input type="hidden" name="method" value="get" />
					<input type="hidden" name="mode" value="search" />
					<input type="hidden" name="form_id" value="form_search" />
					<div class="form_item">
						<div class="size1 give_break10 inline">
							Keywords
						</div><!--
						--><div class="size2 give_break10 inline">
							<input type="text" name="keyword" value="<?php echo $xss['keyword']; ?>" class="input" />
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
				$total_record = $db->select(" select count(id) as num from ".$prefix."users where id != '' and level != 'system' ".$keyword." ");
				$db->close();
				if(!$total_record || empty($total_record['0']['num'])) {
					echo $mw->createTableList('header');
					echo '<tr class="list_item"><td colspan="4" class="text_center">No result founds.</td></tr>';
					echo $mw->createTableList('footer');
				} else {
					$limit = 20;
					$total_record = $total_record['0']['num'];
					$total_page = ceil($total_record / $limit);
					
					$cur_page = (empty($xss['page']) || $xss['page'] < 1) ? 1 : $xss['page'];
					$cur_page = ($cur_page > $total_page) ? $total_page : $cur_page;
					
					$start_id = ($cur_page - 1) * $limit;
					$end_id = (($start_id + $limit) > $total_record) ? ($total_record - $start_id) : $limit;
					
					$db->report = true;
					$db->connect();
					$data = $db->select(" select id, name, email, level, locked, status, date_time from ".$prefix."users where id != '' and level != 'system' ".$keyword." ".$order_by." limit ".$start_id.", ".$end_id." ");
					$db->close();
					if(!$data) {
						echo $mw->createTableList('header');
						echo '<tr class="list_item"><td colspan="4" class="text_center">No result founds.</td></tr>';
						echo $mw->createTableList('footer');
					} else {
						require($fullRoot.'include/page-'.$sysLang.'.php');
						?>
						<form action="<?php echo $adminUrl.'users-action&method=post&form_id=form_delete'; ?>" method="post" id="form_delete" use-ajax="yes">
							<input type="hidden" name="mode" value="delete" />
							<input type="hidden" name="form_id" value="form_delete" />
							<div class="form_response hidden inline"><?php echo $_SESSION['form_response']; ?></div>
							<!--e_subtool-->
							<div class="e_subtool give_space15">
								<div class="delete_box">
									<div class="button_submit three inline"><a href="javascript:;" title="Delete Selected Records" data-type="submit" data-id="form_delete"><strong>Delete Selected Records</strong></a></div>
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
									echo '<tr class="list_item">
										<td>'.$mw->lockedData($data[$i]['id'], $data[$i]['locked']).'</td>
										<td class="details">
											<div class="name give_space5">'.$data[$i]['name'].'</div>
											<div class="info">
												<div class="email inline give_break10">'.$data[$i]['email'].'</div><!--
												--><div class="level inline">'.$array_level[$data[$i]['level']].'</div>
											</div>
											<div class="tool">
												<a href="'.$script_link.$order_by_url.'&page='.$cur_page.'&id='.$data[$i]['id'].'" class="button_edit">Edit</a>
											</div>
											<div class="clear"></div>
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