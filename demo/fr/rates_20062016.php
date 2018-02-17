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
			<h1 class="title text_yellow give_space15"><strong>TARIFS</strong></h1>
			<div class="list_rates">
				<div class="list_title">
					<div class="col col1 inline">DURÉE</div><!--
					--><div class="col col2 inline">TYPE</div><!--
					--><div class="col col3 inline">PRIX</div>
				</div>
				<div class="item">
					<div class="col col1 inline">2 Heures</div><!--
					--><div class="col col2 inline">Coups multiples</div><!--
					--><div class="col col3 inline">5,000 THB</div>
				</div>
				<div class="item">
					<div class="col col1 inline">3 Heures</div><!--
					--><div class="col col2 inline">Coups multiples</div><!--
					--><div class="col col3 inline">6,500 THB</div>
				</div>
				<div class="item">
					<div class="col col1 inline">4 Heures</div><!--
					--><div class="col col2 inline">Coups multiples</div><!--
					--><div class="col col3 inline">8,000 THB</div>
				</div>
				<div class="item">
					<div class="col col1 inline">Nuit (20h - 8h)</div><!--
					--><div class="col col2 inline">Coups multiples</div><!--
					--><div class="col col3 inline">10,000 THB</div>
				</div>
				<div class="item">
					<div class="col col1 inline">24 Heures</div><!--
					--><div class="col col2 inline">Coups multiples</div><!--
					--><div class="col col3 inline">15,000 THB</div>
				</div>
				<div class="item">
					<div class="col col1 inline">A-Level</div><!--
					--><div class="col col2 inline">Frais supplémentaires</div><!--
					--><div class="col col3 inline">2,000 THB</div>
				</div>
				<div class="item last">
					<div class="col col1 inline">Couples</div><!--
					--><div class="col col2 inline">Mari/femme</div><!--
					--><div class="col col3 inline">Doublez les tarifs standard</div>
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