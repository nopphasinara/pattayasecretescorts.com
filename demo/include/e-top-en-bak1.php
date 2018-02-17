<div id="e_slide">
	<div class="content_res">
		<?php
			$db->connect();
			$scrolling = $db->select(" select * from ".$prefix."scrolling_texts where status = 'enable' order by _order asc ");
			$db->close();
			if(!$scrolling) {

			} else {
				$text = '';
				$total_item = count($scrolling);
				for($i = 0; $i < $total_item; $i++) {
					$href = (empty($scrolling[$i]['link'])) ? 'javascript:;' : $scrolling[$i]['link'];
					$target = ($scrolling[$i]['_blank'] == 'yes') ? '_blank' : '_parent';
					$color = (empty($scrolling[$i]['color'])) ? 'color: #fff;' : 'color: '.$scrolling[$i]['color'].';';
					$text[] = '<div class="inline"><a href="'.$href.'" target="'.$target.'" style="'.$color.'">'.$scrolling[$i]['name_'.$sysLang.''].'</a></div>';
				}
				?>
					<marquee behavior="scroll" direction="left" scrollamount="4" onmouseover="this.stop();" onmouseout="this.start();"><?php echo implode('<div class="inline" style="width: 120px;">&nbsp;</div>', $text); ?></marquee>
				<?php
			}
			unset($scrolling, $text, $color, $total_item, $href, $target);
		?>
	</div>
</div>

<div id="e_topbar">
  <div class="content_res">
    <div class="box_left">
      <div class="time">
				<strong><span class="text_yellow">Office Hours:</span> Monday - SUNDAY at 10:00 - 22:00</strong>
			</div>
    </div>
    <div class="box_right">
      PATTAYA CITY, CHONBURI, THA 20150 | <strong>TEL. <?php echo $sitePhone; ?></strong>
    </div>
    <div class="clear"></div>
  </div>
</div>

<div id="e_top">
	<div class="content_res">
		<div class="logo">
			<a href="<?php echo $fullUrl.$sysLang.'/'; ?>" title="<?php echo $tagTitle; ?>"><img src="<?php echo $fullUrl.'image/logo.png'; ?>" width="100%" height="auto" alt="logo.jpg" /></a>
		</div>
		<div class="box">
			<div class="language">
				<div class="label text_yellow"><strong>Select Your Language</strong></div>
				<div class="icon">
					<?php
						$query_string = ($_SERVER['QUERY_STRING'] == '') ? '' : '?'.$_SERVER['QUERY_STRING'];
						foreach($languageSet as $key => $value) {
							echo '<div class="item inline '.$value.'">
								<a href="'.$fullUrl.$value.'/'.implode('/', $fakeUri).'" title="'.$languageLabel[$value].'"><img src="'.$fullUrl.'image/icon-'.$value.'.png" width="40" height="24" alt="icon-'.$value.'.png" /></a>
							</div>';
						}
					?>
				</div>
			</div>
			<div class="fix_button big phone oswald">
				<div class="left inline">&nbsp;</div><!--
				--><div class="body inline">
					<a href="javascript:;" title="Call Us Now! <?php echo $sitePhone; ?>">Tel. <span class="text_white"><?php echo $sitePhone; ?></span></a>
				</div><!--
				--><div class="right inline">&nbsp;</div>
			</div>
			<!--<div class="time">
				<strong><span class="text_yellow">Office Hours:</span> Monday - SUNDAY at 10:00 - 22:00</strong>
			</div>-->
		</div>
		<div class="clear"></div>
	</div>
</div>
