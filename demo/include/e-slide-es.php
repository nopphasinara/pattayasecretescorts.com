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