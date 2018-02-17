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
			<h1 class="title text_yellow give_space15"><strong>الرسوم</strong></h1>
			<div class="list_rates">
				<div class="list_title">
					<div class="col col1 inline">المدة</div><!--
					--><div class="col col2 inline">النوع</div><!--
					--><div class="col col3 inline">السعر</div><!--
					--><div class="col col4 inline">إضافة سيدة اضافية</div>
				</div>
				<div class="item">
					<div class="col col1 inline">1 ساعة</div><!--
					--><div class="col col2 inline">مرات متعددة</div><!--
					--><div class="col col3 inline">4000 بات تايلاندي</div><!--
					--><div class="col col4 inline">+3000 بات تايلاندي</div>
				</div>
				<div class="item">
					<div class="col col1 inline">1.5 ساعات</div><!--
					--><div class="col col2 inline">مرات متعددة</div><!--
					--><div class="col col3 inline">5000 بات تايلاندي</div><!--
					--><div class="col col4 inline">+4000 بات تايلاندي</div>
				</div>
				<div class="item">
					<div class="col col1 inline">ساعتين</div><!--
					--><div class="col col2 inline">مرات متعددة</div><!--
					--><div class="col col3 inline">6000 بات تايلاندي</div><!--
					--><div class="col col4 inline">+5000 بات تايلاندي</div>
				</div>
				<div class="item">
					<div class="col col1 inline">حتى صباح اليوم التالي (من 8:00 مساءً حتى 8:00 صباحاً)</div><!--
					--><div class="col col2 inline">مرات متعددة</div><!--
					--><div class="col col3 inline">10000 بات تايلاندي</div><!--
					--><div class="col col4 inline">+8000 بات تايلاندي</div>
				</div>
				<div class="item last">
					<div class="col col1 inline">24 ساعة</div><!--
					--><div class="col col2 inline">مرات متعددة</div><!--
					--><div class="col col3 inline">15000 بات تايلاندي</div><!--
					--><div class="col col4 inline">+12000 بات تايلاندي</div>
				</div>
			</div>

			<div>&nbsp;</div>
			<h2 class="subtitle text_yellow give_space15"><strong>الأزواج (الزوج / الزوجة)</strong></h2>
			<div class="list_rates">
				<div class="item">
					<div class="col col1 inline">1 ساعة</div><!--
					--><div class="col col2 inline">مرات متعددة</div><!--
					--><div class="col col3 inline">6000 بات تايلاندي</div><!--
					--><div class="col col4 inline">+5000 بات تايلاندي</div>
				</div>
				<div class="item">
					<div class="col col1 inline">1.5 ساعات</div><!--
					--><div class="col col2 inline">مرات متعددة</div><!--
					--><div class="col col3 inline">7000 بات تايلاندي</div><!--
					--><div class="col col4 inline">+6000 بات تايلاندي</div>
				</div>
				<div class="item">
					<div class="col col1 inline">ساعتين</div><!--
					--><div class="col col2 inline">مرات متعددة</div><!--
					--><div class="col col3 inline">8000 بات تايلاندي</div><!--
					--><div class="col col4 inline">+7000 بات تايلاندي</div>
				</div>
				<div class="item">
					<div class="col col1 inline">حتى صباح اليوم التالي (من 8:00 مساءً حتى 8:00 صباحاً)</div><!--
					--><div class="col col2 inline">مرات متعددة</div><!--
					--><div class="col col3 inline">12000 بات تايلاندي</div><!--
					--><div class="col col4 inline">+10000 بات تايلاندي</div>
				</div>
				<div class="item last">
					<div class="col col1 inline">24 ساعة</div><!--
					--><div class="col col2 inline">مرات متعددة</div><!--
					--><div class="col col3 inline">18000 بات تايلاندي</div><!--
					--><div class="col col4 inline">+14000 بات تايلاندي</div>
				</div>
			</div>

			<div>&nbsp;</div>
			<h2 class="subtitle text_yellow give_space15"><strong>A-LEVEL: تهمة إضافية 2000 بات تايلاندي في مرافقة في الحجز.</strong></h2>
			<div>&nbsp;</div>

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