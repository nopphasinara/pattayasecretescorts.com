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
			<h1 class="title text_yellow give_space10"><strong>Booking Completed</strong></h1>
			<p style="font-size: 1.4em;">Thank you for your booking request to the <?php echo $cf->get('siteName'); ?>. We aim to answer all emails as soon as possible, but please allow 24 hours in which to receive a response. For a same day booking request, you may call us between the hours of 1pm and Midnight Thai time at <strong><?php echo $sitePhone; ?>.</strong></p>
			<div>&nbsp;</div>
			<p>
			    <strong><?php echo $cf->get('siteName'); ?></strong><br />
			    &raquo; <a href="http://www.<?php echo substr($cf->get('mailFrom'), strpos($cf->get('mailFrom'), '@') + 1); ?>" title="<?php echo $cf->get('siteName'); ?>" style="color: #fad902;">www.<?php echo substr($cf->get('mailFrom'), strpos($cf->get('mailFrom'), '@') + 1); ?></a><br />
			    &raquo; <a href="mailto:<?php echo $cf->get('mailFrom'); ?>" title="<?php echo $cf->get('mailFrom'); ?>" style="color: #fad902;"><?php echo $cf->get('mailFrom'); ?></a>
			</p>
			<div>&nbsp;</div>
			<p style="color: #777;">Sincerely,<br />
			<strong><?php echo $cf->get('siteName'); ?></strong></p>
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