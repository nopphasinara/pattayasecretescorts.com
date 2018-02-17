<?php
	$query = array(
		'pageName' => $absUri['1'],
		'id' => $absUri['2'],
		'modName' => $absUri['3']
	);
	$xss = $mw->query($query, 'xss');
	
	if(empty($xss['id'])) {
		$mw->notfound();
	}
	
	$db->connect();
	$data = $db->select(" select * from ".$prefix."profiles where status = 'enable' and id = '".$xss['id']."' ");
	$db->close();
	if(!$data || $data['0']['id'] != $xss['id']) {
		$mw->notfound();
	}
	
	$data = $data['0'];
	
	$db->connect();
	$db->command(" update ".$prefix."profiles set _view = _view + 1 where id = '".$data['id']."' ");
	$db->close();
	
	$data['detail_'.$sysLang.''] = (empty($data['detail_'.$sysLang.''])) ? $data['detail_'.$defaultLang.''] : $data['detail_'.$sysLang.''];
	
	$tagTitle = $data['nickname'].' - '.$cf->get('siteName');
	$tagDescription = strip_tags($data['detail_'.$sysLang.'']);
	
	$script['fancybox'] = 'yes';
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
			<h1 class="title text_yellow give_space10 icon_devil"><strong><?php echo $data['nickname']; ?></strong></h1>
			
			<!--e_profile-->
			<div id="e_profile">
				<div class="details">
					<div class="description">
						<?php echo $data['detail_'.$sysLang.'']; ?>
					</div>
					<div class="size">
						<div class="item">
							<div class="label inline">
								<strong>身長:</strong>
							</div><!--
							--><div class="info inline">
								<?php if(empty($data['height'])) { echo '-'; } else { echo $data['height']; } ?> cm
							</div>
						</div>
						<div class="item">
							<div class="label inline">
								<strong>体重:</strong>
							</div><!--
							--><div class="info inline">
								<?php if(empty($data['weight'])) { echo '-'; } else { echo $data['weight']; } ?> kg
							</div>
						</div>
						<div class="item">
							<div class="label inline">
								<strong>靴のサイズ:</strong>
							</div><!--
							--><div class="info inline">
								<?php if(empty($data['shoe_size'])) { echo '-'; } else { echo $data['shoe_size']; } ?> eu
							</div>
						</div>
					</div>
					<div class="label">
						<?php
							if($data['_new'] == 'yes') { echo '<div class="item inline"><img src="'.$fullUrl.'image/icon-new.png" width="104" alt="icon-new.png" /></div>'; }
							if($data['_hot'] == 'yes') { echo '<div class="item inline"><img src="'.$fullUrl.'image/icon-hot.png" width="104" alt="icon-hot.png" /></div>'; }
						?>
					</div>
					<?php require($fullRoot.'include/button-booking.php'); ?>
				</div>
				<div class="photos">
					<div class="top">&nbsp;</div>
					<div class="body">
						<?php
							$db->connect();
							$photo = $db->select(" select * from ".$prefix."photos where profile_id = '".$data['id']."' order by _order asc ");
							$db->close();
							if(!$photo) {
								echo '<div class="text_center text_red"><strong>写真は利用できません。</strong></div>';
							} else {
								$total_item = count($photo);
								$ceil_row = ceil($total_item / 2);
								$row = 0;
								$n = 1;
								for($i = 0; $i < $total_item; $i++) {
									$last = ($n == 2) ? 'last' : '';
									$row = ($n == 1) ? ($row + 1) : $row;
									$last_row = ($row == $ceil_row) ? 'last_row' : '';
									echo '<div class="item inline '.$last.' '.$last_row.'">
										<a href="'.$fullUrl.'image-profile/'.$photo[$i]['file_name'].'" title="" class="fancybox" rel="group"><img src="'.$fullUrl.'image-profile/thumbnail/'.$photo[$i]['file_name'].'" width="155" alt="'.$photo[$i]['file_name'].'" /></a>
									</div>';
									$n = $n + 1;
									$n = ($n > 2) ? 1 : $n;
								}
							}
						?>
					</div>
					<div class="bottom">&nbsp;</div>
				</div>
				<div class="clear"></div>
			</div>
			<!--e_profile-->
			
			<div>&nbsp;</div><div>&nbsp;</div>
			
			<!--e_option-->
			<div id="e_option">
				<h2 class="title text_yellow give_space15 give_border">詳細オプション：</h2>
				<div class="item inline">
					<?php
						$db->connect();
						$receives = $db->select(" select * from ".$prefix."services where status = 'enable' and receives = 'yes' order by name_".$sysLang." asc ");
						$db->close();
						if(!$receives) {
							
						} else {
							$total_item = count($receives);
							$ceil_row = ceil($total_item / 2);
							$row = 0;
							$n = 1;
							for($i = 0; $i < $total_item; $i++) {
								$receives[$i]['name_'.$sysLang.''] = empty($receives[$i]['name_'.$sysLang.'']) ? $receives[$i]['name_'.$defaultLang.''] : $receives[$i]['name_'.$sysLang.''];
								echo '<div class="item">
									<div class="'.$mw->checkService($data['id'], $receives[$i]['id']).' inline">
										&nbsp;
									</div><!--
									--><div class="option inline">
										受け手: '.$receives[$i]['name_'.$sysLang.''].'
									</div>
								</div>';
							}
						}
					?>
				</div><!--
				--><div class="item inline last last_row">
					<?php
						$db->connect();
						$offers = $db->select(" select * from ".$prefix."services where status = 'enable' and offers = 'yes' order by name_".$sysLang." asc ");
						$db->close();
						if(!$offers) {
							
						} else {
							$total_item = count($offers);
							$ceil_row = ceil($total_item / 2);
							$row = 0;
							$n = 1;
							for($i = 0; $i < $total_item; $i++) {
								$offers[$i]['name_'.$sysLang.''] = empty($offers[$i]['name_'.$sysLang.'']) ? $offers[$i]['name_'.$defaultLang.''] : $offers[$i]['name_'.$sysLang.''];
								echo '<div class="item">
									<div class="'.$mw->checkService($data['id'], $offers[$i]['id']).' inline">
										&nbsp;
									</div><!--
									--><div class="option inline">
										やり手: '.$offers[$i]['name_'.$sysLang.''].'
									</div>
								</div>';
							}
						}
					?>
				</div>
			</div>
			<!--/e_option-->
			
			<!--e_video-->
			<div id="e_video">
				<?php
					if(strtolower($data['show_video']) == 'yes') {
						if(!empty($data['video'])) {
							?>
								<div class="form_item">
									<div class="size1 inline give_break10">
										&nbsp;
									</div><!--
									--><div class="size5 inline">
										<link type="text/css" rel="stylesheet" href="<?php echo $fullUrl; ?>videocontrol/jquery.videocontrols.css">
										<script type="text/javascript" src="<?php echo $fullUrl; ?>videocontrol/jquery.videocontrols.js"></script>
										<video id="myVideo_demo" width="640" height="480" controls="controls" bgcolor="#000000" poster="<?php echo $fullUrl.'image/video.jpg'; ?>">
											<source src="<?php echo $fullUrl.'video/'.$data['video']; ?>">
										</video>
										<script type="text/javascript">
											$(document).ready(function () {
												$('#myVideo_demo').videocontrols({
													//markers: [40, 84, 158, 194, 236, 272, 317, 344, 397, 447, 490, 580],
													preview: {
														step: 50,
														width: 640,
														height: 480
													},
													theme: {
														progressbar: 'red',
														range: 'yellow',
														volume: 'yellow'
													}
												});
											});
										</script>
									</div>
								</div>
							<?php
						} else if(!empty($data['embed'])) {
							?>
								<div class="form_item">
									<div class="size1 inline give_break10">
										&nbsp;
									</div><!--
									--><div class="size5 inline">
										<?php echo htmlspecialchars_decode($data['embed']); ?>
									</div>
								</div>
							<?php
						}
					}
				?>
			</div>
			<!--/e_video-->
			
			<div>&nbsp;</div><div>&nbsp;</div>
			
			<!--e_review-->
			<div id="e_review">
				<?php
					$db->connect();
					$review = $db->select(" select * from ".$prefix."reviews where status = 'enable' and profile_id = '".$data['id']."' order by date_time desc ");
					$db->close();
					if(!$review) {
						echo '<h2 class="title text_yellow give_space15 give_border">口コミ (0)</h2>';
						echo '<div class="text_center"><strong>最初の口コミを書きましょう</strong></div>';
					} else {
						$total_item = count($review);
						echo '<h2 class="title text_yellow give_space15 give_border">口コミ ('.number_format($total_item, 0, '', ',').')</h2>';
						for($i = 0; $i < $total_item; $i++) {
							$star = '';
							for($k = 0; $k < $review[$i]['rate']; $k++) {
								$star .= '<div class="star inline">&nbsp;</div>';
							}

							for($k = 1; $k <= (10 - $review[$i]['rate']); $k++) {
								$star .= '<div class="star_blind inline">&nbsp;</div>';
							}

							echo '<div class="item">
								<div class="message">
									'.$review[$i]['text'].'
								</div>
								<div class="info">
									<div class="name text_yellow inline"><strong>'.$review[$i]['name'].'</strong></div>
									'.$star.'
								</div>
							</div>';
						}
					}
				?>
			</div>
			<!--/e_review-->
			
			<div>&nbsp;</div><div>&nbsp;</div>
			
			<!--e_add_review-->
			<div id="e_add_review">
				<h2 class="title text_yellow give_space15 give_border">口コミを書く</h2>
				<form action="<?php echo $fullUrl.$sysLang.'/review-action.html'; ?>" method="post" id="form_review" use-ajax="yes">
					<input type="hidden" name="mode" value="add" />
					<input type="hidden" name="profile_id" value="<?php echo $data['id']; ?>" />
					<input type="hidden" name="form_id" value="form_review" />
					<div class="form_response hidden"><?php echo $_SESSION['form_response']; ?></div>
					<div class="form_item">
						<div class="label inline">
							あなたの名前 <strong>*</strong>
						</div><!--
						--><div class="inline">
							<input type="text" name="name" value="" class="input" />
						</div>
					</div>
					<div class="form_item">
						<div class="label inline">
							メールアドレス <strong>*</strong>
						</div><!--
						--><div class="inline">
							<input type="text" name="email" value="" class="input" />
						</div>
					</div>
					<div class="form_item">
						<div class="label inline">
							コメント <strong>*</strong>
						</div><!--
						--><div class="inline">
							<textarea name="text" rows="5" class="input"></textarea>
						</div>
					</div>
					<div class="form_item">
						<div class="label inline">
							評価
						</div><!--
						--><div class="inline">
							<select name="rate" class="input">
								<?php
									for($i = 1; $i <= 10; $i++) {
										echo '<option value="'.$i.'">'.$i.'</option>';
									}
								?>
							</select>
						</div>
					</div>
					<div class="form_item">
						<div class="label inline">
							&nbsp;
						</div><!--
						--><div class="inline">
							<?php
								require_once($fullRoot.'include/recaptchalib.php');
								echo recaptcha_get_html($publickey);
							?>
						</div>
					</div>
					<div class="form_item last">
						<div class="label inline">
							&nbsp;
						</div><!--
						--><div class="inline">
							<div class="button_submit inline fix_button small oswald">
								<div class="left inline">&nbsp;</div><!--
								--><div class="body inline">
									<a href="javascript:;" title="Submit" data-type="submit" data-id="form_review" class="text_white">提出する</a>
								</div><!--
								--><div class="right inline">&nbsp;</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!--/e_add_review-->
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