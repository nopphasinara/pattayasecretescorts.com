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
			<h1 class="title text_yellow give_space15"><strong>TARIFFE</strong></h1>
			<div class="list_rates">
				<div class="list_title">
					<div class="col col1 inline">DURATA</div><!--
					--><div class="col col2 inline">TIPO</div><!--
					--><div class="col col3 inline">PREZZO</div>
				</div>
				<div class="item">
					<div class="col col1 inline">2 ore</div><!--
					--><div class="col col2 inline">Shot multipli</div><!--
					--><div class="col col3 inline">5,000 THB</div>
				</div>
				<div class="item">
					<div class="col col1 inline">3 ore</div><!--
					--><div class="col col2 inline">Shot multipli</div><!--
					--><div class="col col3 inline">6,500 THB</div>
				</div>
				<div class="item">
					<div class="col col1 inline">4 ore</div><!--
					--><div class="col col2 inline">Shot multipli</div><!--
					--><div class="col col3 inline">8,000 THB</div>
				</div>
				<div class="item">
					<div class="col col1 inline">Di notte (8pm - 8am)</div><!--
					--><div class="col col2 inline">Shot multipli</div><!--
					--><div class="col col3 inline">10,000 THB</div>
				</div>
				<div class="item">
					<div class="col col1 inline">24 ore</div><!--
					--><div class="col col2 inline">Shot multipli</div><!--
					--><div class="col col3 inline">15,000 THB</div>
				</div>
				<div class="item">
					<div class="col col1 inline">Sesso anale</div><!--
					--><div class="col col2 inline">Tariffa aggiuntiva</div><!--
					--><div class="col col3 inline">2,000 THB</div>
				</div>
				<div class="item last">
					<div class="col col1 inline">Coppie</div><!--
					--><div class="col col2 inline">Marito/Moglie</div><!--
					--><div class="col col3 inline">Ildoppiodelletariffe indicate</div>
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