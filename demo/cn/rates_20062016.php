<?php
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
			<h1 class="title text_yellow give_space15"><strong>价格</strong></h1>
			<div class="list_rates">
				<div class="list_title">
					<div class="col col1 inline">持续时间</div><!--
					--><div class="col col2 inline">类型</div><!--
					--><div class="col col3 inline">价格</div>
				</div>
				<div class="item">
					<div class="col col1 inline">2 小时</div><!--
					--><div class="col col2 inline">多次性爱</div><!--
					--><div class="col col3 inline">5000 泰铢</div>
				</div>
				<div class="item">
					<div class="col col1 inline">3 小时</div><!--
					--><div class="col col2 inline">多次性爱</div><!--
					--><div class="col col3 inline">6500 泰铢</div>
				</div>
				<div class="item">
					<div class="col col1 inline">4 小时</div><!--
					--><div class="col col2 inline">多次性爱</div><!--
					--><div class="col col3 inline">8000 泰铢</div>
				</div>
				<div class="item">
					<div class="col col1 inline">过夜（下午8点－次日上午8点）</div><!--
					--><div class="col col2 inline">多次性爱</div><!--
					--><div class="col col3 inline">10000 泰铢</div>
				</div>
				<div class="item">
					<div class="col col1 inline">24 小时</div><!--
					--><div class="col col2 inline">多次性爱</div><!--
					--><div class="col col3 inline">15000 泰铢</div>
				</div>
				<div class="item">
					<div class="col col1 inline">A－级</div><!--
					--><div class="col col2 inline">附加费用</div><!--
					--><div class="col col3 inline">2000 泰铢</div>
				</div>
				<div class="item last">
					<div class="col col1 inline">情侣</div><!--
					--><div class="col col2 inline">丈夫/妻子</div><!--
					--><div class="col col3 inline">标准费用加倍</div>
				</div>
			</div>
			
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