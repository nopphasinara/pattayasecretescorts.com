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
						<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="Entra nella galleria foto">Entra nella galleria foto</a>
					</div><!--
					--><div class="right inline">&nbsp;</div>
				</div>
			</div>

			<h1 class="title text_yellow give_space15"><strong>BENVENUTO SU <?php echo $cf->get('siteName'); ?></strong></h1>
			<p>Negli ultimi 10 anni, Devil’s Den Thailand è riuscito a farsi conoscere come uno dei migliori servizi di intrattenimento della Thailandia. Famoso per la sua integrità ed onestà, ha definito degli standard elevatissimi per la concorrenza nella regolamentazione dei controlli medici attraverso ospedali autorizzati a livello internazionale.</p>
			<div>&nbsp;</div>
			<p>Riconoscendo che in questi tempi di cambiamento e di nuove esigenze ci sono quelli che preferiscono la discrezione che viene dal ricevere questi servizi nella riservatezza delle proprie abitazioni, Devil’s Den ha deciso che è il momento giusto per espandere la propria gamma di servizi premium per venire incontro a queste esigenze.</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">TI GARANTIAMO;</h2>
			<p>1. Che tutte le escort vengono sottoposte a esami del sangue mensili e a esami dell’HIV e di MST ogni due settimane in affidabili ospedali internazionali e che i risultati vengono pubblicati sui loro profili.</p>
			<div>&nbsp;</div>
			<p>2. Che tutte le foto sono una rappresentazione reale della ragazza e che da noi non saranno mai tollerati fotoritocchi di alcun tipo.</p>
			<div>&nbsp;</div>
			<p>3. Che i servizi offerti dalle singole escort sono quelli che verranno forniti se così desiderato.</p>
			<div>&nbsp;</div>
			<p class="text_yellow text_center"><strong><?php echo $cf->get('siteName'); ?>: Dove le fantasie diventano realtà</strong></p>
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
