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
			<h1 class="title text_yellow give_space15"><strong>APARTAR</strong></h1>
			<h2 class="subtitle text_yellow give_space15">USTED PUEDE APARTAR POR MEDIO DE CORREO ELECTRÓNICO DESDE EL LINK EN ESTE SITIO, O POR MEDIO DEL TELÉFONO QUE SE MUESTRA.</h2>
			<p>Todos los costos se encuentran en la sección de <a href="<?php echo $fullUrl.$sysLang.'/'; ?>rates.html" title="TARIFAS">TARIFAS</a>.  Las tarifas no son negociables. Gracias por su comprensión.</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">LOS PAGOS DEBEN SER:</h2>
			<p>A. Dentro de los 10 minutos después de haber conocido a su dama.</p>
			<div>&nbsp;</div>
			<p>Ó</p>
			<div>&nbsp;</div>
			<p>B. Pagar en su totalidad a nuestra cuenta de PayPal a través de la tarjeta de crédito.</p>
			<div>&nbsp;</div>
			<p>Para evitar un momento embarazoso de no contar con el tipo de cambio o la cantidad correcta de dinero, requerimos el pago hecho en Baths Tailandeses dentro de los primeros 10 minutos después de conocer a su dama.  El reloj empieza cuando se encuentran, lo que tratar de retrasar el pago sólo reduce el tiempo de calidad del que puede disfrutar con su dama.  Nuestras damas han sido instruidas para preguntar por una cuota de cancelación si usted se retira, si el cliente no paga la cantidad completa dentro de los primeros 10 minutos después de conocerse.</p>
			<div>&nbsp;</div>
			<p>La cancelación por cualquier razón después de la llegada de la dama, se le cargará en 1,000 Baths Tailandeses para cubrir su costo de transporte.  Un cargo por cancelación también aplica si usted cancela su cita después de que la dama está siendo transportada en taxi hasta donde usted se encuentra.</p>
			<div>&nbsp;</div>
			<p>Cuando realice el apartado, usted está de acuerdo con éstos términos.</p>
			<div>&nbsp;</div>
			<p>Ningún apartado será confirmado hasta que hayamos checado su número habitación de hotel y haber hablado con usted estando en el hotel por medio de teléfono.  Apartados provisionales se pueden hacer, pero se le requerirá que nos otorgue su nombre completo, hotel y número de habitación.</p>
			<div>&nbsp;</div>
			<p>Lo ideal sería que, debido al tamaño geográfico de Bangkok, usted debe tratar de reservar al menos 1 hora antes de la hora de la cita deseada.</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">APARTADOS POR ADELANTADO</h2>
			<p>Para pre-reserva, un depósito del 50% es requerido y el pago es a nuestra cuenta de PayPal a través de la tarjeta de crédito. Por favor, póngase en contacto con nosotros para otras maneras de hacer el depósito del 50%. El resto del pago se hará cuando se reúna con la escolta.</p>
			<div>&nbsp;</div>
			<p>Cualquier extensión sobre el tiempo original, será cargado sobre los precios publicados y con el consentimiento de la dama.</p>
			<div>&nbsp;</div>
			<p>Las propinas no son requeridas ya que se le ha hecho el cargo de “todo incluido”.  Sin embargo, si siente que la dama ha cumplido sus deseos, entonces una muestra de su gratitud siempre es bienvenida.</p>
			<div>&nbsp;</div>
			<p>Las damas no están preparadas para juntarse con más de un hombre, y la cita no podrá suceder en un cuarto compartido con algún otro huésped.  Bajo esas circunstancias, el pago por una cita de 1 hora será aplicado y la dama se retirará inmediatamente.</p>
			<div>&nbsp;</div>
			<p>Los términos “parejas”, se refiere a un hombre y una mujer compañera.  Debido a nuestras altas normas de salud, nuestras damas no interacturarán con mujeres de otras agencias o en establecimientos de entretenimiento para adultos.</p>
			<div>&nbsp;</div>
			<p>Las tarifas mostradas son estrictamente por la compañía de la dama.  Todas y cualquier otra actividad que pudieran suceder, sería bajo el consentimiento mutuo de los dos adultos.</p>
			<div>&nbsp;</div>
			<p>¡<?php echo $cf->get('siteName'); ?> se preocupa por complacerle de cualquier manera en la que podamos!  Todo lo que se le pide es que trate a las damas con respeto.</p>

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