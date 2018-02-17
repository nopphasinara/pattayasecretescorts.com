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
						<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="VOIR NOTRE GALERIE">VOIR NOTRE <span class="text_white">GALERIE</span></a>
					</div><!--
					--><div class="right inline">&nbsp;</div>
				</div>
			</div>

			<h1 class="title text_yellow give_space15"><strong>BIENVENUE CHEZ <?php echo $cf->get('siteName'); ?></strong></h1>
			<p>En 10 ans, Devil's Den Thaïlande s'est établi comme un des principaux prestataires de services pour adultes en Thaïlande. Reconnu pour son intégrité et son honnêteté, il a été le premier dans le milieu à mettre en place des contrôle de santé via des hôpitaux internationaux, établissant ainsi un nouveau standard.</p>
			<div>&nbsp;</div>
			<p>Évoluant avec son temps et conscient que certains préfèrent recevoir ces services dans l'intimité de leur logement, Devil's Den a décidé qu'il était temps d'étendre son service premium pour répondre à cette demande.</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">NOUS GARANTISSONS:</h2>
			<p>1. Que toutes nos escort-girls sont soumises à une prise de sang mensuelle et un prélèvement bi-mensuel pour test VIH et IST. Ces examens sont réalisés dans un hôpital international réputé et les résultats sont publiés sur leur profil.</p>
			<div>&nbsp;</div>
			<p>2. Que toutes les photos des filles sont représentatives de la réalité et qu'aucune modification photo-shop n'est tolérée.</p>
			<div>&nbsp;</div>
			<p>3. Que les services offerts par chaque escort-girl sont ceux qui seront offerts si demandés.</p>
			<div>&nbsp;</div>
			<p class="text_yellow text_center"><strong><?php echo $cf->get('siteName'); ?> : là où les fantasmes prennent vie</strong></p>
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
