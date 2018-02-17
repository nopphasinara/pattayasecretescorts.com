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
			<div class="banner">
				<div class="img">
					<img src="<?php echo $fullUrl.'image/banner.png'; ?>" width="100%" alt="banner.jpg" />
				</div>

				<div class="fix_button small oswald">
					<div class="left inline">&nbsp;</div><!--
					--><div class="body inline" dir="rtl">
						<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="الدخول إلى معرض الصور">الدخول إلى معرض الصور</a>
					</div><!--
					--><div class="right inline">&nbsp;</div>
				</div>
			</div>

			<h1 class="title text_yellow give_space15" dir="rtl"><strong>Welcome to <?php echo $cf->get('siteName'); ?></strong></h1>
			<p dir="rtl">في خلال مدة ثمان سنوات تمكن دِفلز دِن في تايلاند من تثبيت نفسه كأحد أهم مقدمي خدمات الترفيه الخاص بالبالغين في تايلاند.

			فهو يشتهر بالنزاهة والصدق مما جعل الآخرين يطمحون بالوصول لذات الدرجات وذلك من خلال تنظيمه للفحوصات الطبية التي تقام بمساعدة المستشفيات المرخصة دولياً.
			</p>
			<div>&nbsp;</div>
			<p dir="rtl">نحن ندرك بأننا في زمن متغير وبأنه هناك من يفضلون الحصول على هذه الخدمات في خصوصية أماكن إقامتهم. لذلك قررنا في دِفلز دِن بأنه جاء الوقت المثالي لتوسيع خدماتنا لتلبية هذه المتطلبات.</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15" dir="rtl">نحن نضمن بأن:</h2>
			<p dir="rtl">1. جميع المرافِقات قد خضعن إلى فحوصات دم شهرية بالإضافة إلى فحوصات تقام كل أسبوعين من أجل الإدز والأمراض المنقولة جنسياً. وهذه الفحوصات يقوم بها مستشفى دولي معروف وتُنشر النتائج على الصفحة الخاصة بكل من المرافِقات.</p>
			<div>&nbsp;</div>
			<p dir="rtl">2. جميع الصور المنشورة هي صور حقيقية لكل من السيدات ونحن لا نقبل بأي تعديلات لهذه الصور من خلال الفوتوشوب.</p>
			<div>&nbsp;</div>
			<p dir="rtl">3. ستحصلون على جميع الخدمات المذكور على صفحة المرافقة بأنها تقدمها والتي تختارونها أنتم من اللائحة.</p>
			<div>&nbsp;</div>
			<p class="text_yellow text_center" dir="rtl"><strong><?php echo $cf->get('siteName'); ?>: حيث التخيلات تتحقق</strong></p>
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