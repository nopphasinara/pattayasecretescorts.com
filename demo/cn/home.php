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
					--><div class="body inline">
						<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="进入我们的画廊">进入我们的画廊</a>
					</div><!--
					--><div class="right inline">&nbsp;</div>
				</div>
			</div>

			<h1 class="title text_yellow give_space15"><strong>欢迎来到 <?php echo $cf->get('siteName'); ?></strong></h1>
			<p>经过8年的努力，Devil's Den Thailand已经将自己成功打造成泰国最重要的一家成人娱乐提供商。 我们秉承正直和诚实守信的原则，并且通过建立标准，以便让其他人愿意使用来自国际授权医院的健康检查。</p>
			<div>&nbsp;</div>
			<p>我们意识到，在这个迅速发生变化和需求的时代，有一些人希望按照自己的意愿在他们自己的下榻之处接收服务，Devil's Den认识到现在是拓展我们优质的服务、以满足这项需求的最佳时机。</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">我们保证;</h2>
			<p>1. 所有的应召女郎都在一家著名的国际医院进行了每月的血液测试、以及双周的艾滋病和性病检测、并且目前的检测结果都会发布在她们的个人资料中。</p>
			<div>&nbsp;</div>
			<p>2. 所有照片都是所涉及女郎的真实照片，并且没有使用photo-shop对照片进行过改动。</p>
			<div>&nbsp;</div>
			<p>3. 每个应召女郎会根据需要提供服务。</p>
			<div>&nbsp;</div>
			<p class="text_yellow text_center"><strong><?php echo $cf->get('siteName'); ?>: 可让您的梦想成真</strong></p>
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