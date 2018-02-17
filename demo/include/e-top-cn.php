<div id="e_top">
	<div class="content_res">
		<div class="logo">
			<a href="<?php echo $fullUrl.$sysLang.'/'; ?>" title="<?php echo $tagTitle; ?>"><img src="<?php echo $fullUrl.'image/logo.png'; ?>" width="100%" height="auto" alt="logo.jpg" /></a>
		</div>
		<div class="box">
			<div class="language">
				<div class="label text_yellow"><strong>选择您的语言</strong></div>
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
					<a href="javascript:;" title="联系电话。 <?php echo $sitePhone; ?>">联系电话。 <span class="text_white"><?php echo $sitePhone; ?></span></a>
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
