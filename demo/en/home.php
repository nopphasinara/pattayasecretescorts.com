<?php
	require($fullRoot.'include/html-top.php');
  require($fullRoot.'include/header.php');
?>

<!--e_wrapper-->
<div id="e_wrapper">
	<div class="content_res expand-width">
		<!--e_left-->
		<?php // require($fullRoot.'include/e-left-'.$sysLang.'.php'); ?>
		<!--/e_left-->

		<!--e_content-->
		<div id="e_content">
			<h1 class="title text_yellow give_space15 text-center"><strong>WELCOME TO <?php echo $cf->get('siteName'); ?></strong></h1>

      <br>

			<p>It has become obvious that changes are taking place in Thailand and particularly within Pattaya. Therefore we at <?php echo $cf->get('siteName'); ?> have decided now is the perfect time to be in the vanguard of those changes. To that end we are delighted to offer a new and outstanding service here in Pattaya -  the emphasis being on discretion, quality of service and the health and welfare of both escorts and clients alike.</p>

      <br><br>

			<p class="text_yellow text_center text-titlecase display-5"><strong><?php echo $cf->get('siteName'); ?></strong></p>
			<p class="text_yellow text_center text-titlecase display-4"><strong>"Discretion And Perfection, A Perfect Harmony"</strong></p>
		</div>
		<!--/e_content-->

		<!--e_right-->
		<?php // require($fullRoot.'include/e-right-'.$sysLang.'.php'); ?>
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
