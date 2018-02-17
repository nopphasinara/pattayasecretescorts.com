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
						<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="Enter Our Gallery">Enter Our <span class="text_white">Gallery</span></a>
					</div><!--
					--><div class="right inline">&nbsp;</div>
				</div>
			</div>

			<h1 class="title text_yellow give_space15"><strong>WELCOME TO <?php echo $cf->get('siteName'); ?></strong></h1>
			<p>Over a period of 10 years, Devil's Den Thailand has managed to establish itself as one of the foremost adult entertainment providers in Thailand. Renowned for its integrity and honesty, it has set the standard for others to aspire into regulating health checks via Internationally licensed hospitals.</p>
			<div>&nbsp;</div>
			<p>Recognizing that in these changing and demanding times there are those that prefer the discretion of receiving service in the privacy of their own be it temporary accommodation, Devil's Den has decided that now is the right time to expand our premium service to meet this demand.</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">WE GUARANTEE;</h2>
			<p>1. That all Devils Den escorts, irrespective of gender, will have undergone monthly blood tests for HIV and STD's by a reputable international hospital and the current results published in their profile.</p>
			<div>&nbsp;</div>
			<p>2. That all Pictures are a true current representation of the escorts concerned.</p>
			<div>&nbsp;</div>
			<p>3. That the services offered by individual escorts are those that will be supplied if so desired.</p>
			<div>&nbsp;</div>
			<p class="text_yellow text_center"><strong><?php echo $cf->get('siteName'); ?>: Where Fantasies Come True</strong></p>
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
