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
						<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="ENTRAR GALERÍA">ENTRAR <span class="text_white">GALERÍA</span></a>
					</div><!--
					--><div class="right inline">&nbsp;</div>
				</div>
			</div>

			<h1 class="title text_yellow give_space15"><strong>BENVENIDO A <?php echo $cf->get('siteName'); ?></strong></h1>
			<p>En un período de 10 años, Devil's Den Tahiland ha logrado establecerse a sí mismo como de los más importantes proveedores de entretenimiento para adultos en Tailandia.  Renombrado por su integridad y honestidad, ha establecido un nivel para incitar a otros a regular sus exámenes de salud a través de hospitales con licencias Internacionales.</p>
			<div>&nbsp;</div>
			<p>Reconociendo que en éstos tiempos tan cambiantes y demandantes, hay aquellas personas que prefieren discreción al recibir servicio en la privacidad de su propio alojamiento, Devil's Den ha decidido que ahora es el tiempo perfecto para expandir nuestro Servicio Premium para atender ésta demanda.</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">GARANTIZAMOS:</h2>
			<p>1. Que todas nuestras damas de compañía llevan a cabo mensualmente exámenes de sangre y cada dos semanas exámenes de VIH y enfermedades transmitidas sexualmente por un hospital internacional con reputación y los resultados serán publicados en los perfiles correspondientes.</p>
			<div>&nbsp;</div>
			<p>2. Que todas las Fotografías son la verdadera presentación de la dama en cuestión y que ninguna alteración digital jamás será tolerada.</p>
			<div>&nbsp;</div>
			<p>3. Que los servicios ofrecidos individualmente por las damas de compañía son los que serán otorgados si así lo desea.</p>
			<div>&nbsp;</div>
			<p class="text_yellow text_center"><strong><?php echo $cf->get('siteName'); ?>: Donde las fantasías se hacen realidad.</strong></p>
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
