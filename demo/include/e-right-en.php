<div id="e_right" class="sidebar">&nbsp;
	<?php /*<div class="girl">
		<img src="<?php echo $fullUrl.'image/girl-right.png'; ?>" width="150" height="355" alt="girl-right.png" />
	</div>
	<?php
		$db->connect();
		$banner = $db->select(" select * from ".$prefix."banners where status = 'enable' and banner_side = 'right' order by _order asc ");
		$db->close();
		if(!$banner) {

		} else {
			$total_item = count($banner);
			for($i = 0; $i < $total_item; $i++) {
				$href = (empty($banner[$i]['link'])) ? 'javascript:;' : $fullUrl.$sysLang.'/click-action.html?banner_id='.$banner[$i]['id'].'&url='.$banner[$i]['link'].'';
				$target = ($banner[$i]['_blank'] == 'yes') ? '_blank' : '_parent';

				if($banner[$i]['banner_type'] == 'image') {
					?>
						<div class="banner">
							<a href="<?php echo $href; ?>" title="<?php echo $banner[$i]['name']; ?>" target="<?php echo $target; ?>"><img src="<?php echo $fullUrl.'image-banner/'.$banner[$i]['file_name']; ?>" width="149" alt="<?php echo $banner[$i]['name']; ?>" /></a>
						</div>
					<?php
				} else if($banner[$i]['banner_type'] == 'link') {
					?>
						<div class="link">
							<div class="item">
								<a href="<?php echo $href; ?>" title="<?php echo $banner[$i]['name']; ?>" target="<?php echo $target; ?>"><?php echo $banner[$i]['name']; ?></a>
							</div>
						</div>
					<?php
				}
			}
		}

		unset($banner, $href, $target, $total_item);
	?>*/ ?>
</div>
