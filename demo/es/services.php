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
			<h1 class="title text_yellow give_space10"><strong>SERVICIOS</strong></h1>
			<h2 class="subtitle text_yellow give_space15">¡IMAGÍNESE ÉSTO!</h2>
			<div class="list_normal">
				<div class="item">Su opción de una, dos o más hermosas chicas Tailandesas a cuantas pueda manejar.</div>
				<div class="item">1 horas (o más) para consentirlo, donde usted es el director y la estrella de todo lo que suceda.</div>
				<div class="item">Todo a disfrutar en la privacidad y confort de su cuarto de hotel.</div>
				<div class="item">La máxima experiencia y las fantasías de un sueño de toda la vida, por fin alcanzado.</div>
				<div class="item last">¡Satisfacción garantizada!</div>
			</div>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">TODO ÉSTO POR UN PRECIO FIJO CON TODO UNCLUÍDO.</h2>
			<p>¿Por qué perder su preciado tiempo y dinero sólo para quedarse decepcionado por el un servicio regular Tailandés?  Una visita al <?php echo $cf->get('siteName'); ?> le mostrará lo que el placer Tailandés en realidad quiere decir.</p>
			<div>&nbsp;</div>
			<p><?php echo $cf->get('siteName'); ?> le ofrece a cada hombre, mujer, o pareja buscando pasión y placer, una experiencia que debería ser vivída al menos una vez en la vida.</p>
			<div>&nbsp;</div>
			<p>En <?php echo $cf->get('siteName'); ?> estamos dedicados a hacer su experiencia inolvidable, así mismo, valoramos sus ideas y opiniones sobre nuestros servicios.  Contáctenos por medio de correo electrónico a <a href="mailto:<?php echo $bookingEmail; ?>"><?php echo $bookingEmail; ?></a>.  Si está buscando un servicio específico y trataremos de guiarlo y acomodarlo.</p>
			<div>&nbsp;</div>
			<p><strong class="text_yellow">Nivel-A:</strong> Algunas de nuestras damas son capaces de proveer los servicios Nivel-A (aplican cargos extras , por favor vea las tarifas para revisar éstos cargos).</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">UNIFORMES DE LAS DAMAS</h2>
			<p>Ofrecemos una gama de uniformes sexis para escoger.  Están disponibles sin costo extra y pueden hacer su encuentra todavía más memorable.</p>
			<div>&nbsp;</div>
			<div class="list_normal">
				<div class="item">Colegiala</div>
				<div class="item">Azafata</div>
				<div class="item">Mujer Policía</div>
				<div class="item">Criada Francesa</div>
				<div class="item">Enfermera</div>
				<div class="item last">Ligueros</div>
			</div>
			<div>&nbsp;</div>
			<p>Por supuesto, usted es libre de proveer algún uniforme si así lo desea.  ¡Las damas de Devil's Den están aquí para complacerlo!</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">CÓMO APARTAR UNA DAMA DE <?php echo $cf->get('siteName'); ?></h2>
			<p>Puede enviar un correo electrónico a  <a href="mailto:<?php echo $bookingEmail; ?>"><?php echo $bookingEmail; ?></a> haciendo click el recuadro que dice APARTAR AHORA, el cual se muestra en cada página.</p>
			<div>&nbsp;</div>
			<p>Como opción, puede usted hablarnos diariamente al número telefónico <?php echo $sitePhone; ?>, entre 12:00 y 22:00 horas.</p>

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