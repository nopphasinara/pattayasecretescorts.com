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
			<h1 class="title text_yellow give_space10"><strong>УСЛУГИ</strong></h1>
			<h2 class="subtitle text_yellow give_space15">ТОЛЬКО ПРЕДСТАВЬТЕ СЕБЕ ЭТО!</h2>
			<div class="list_normal">
				<div class="item">Вы можете выбрать одну, две или столько Тайских красавиц, со сколькими управитесь.</div>
				<div class="item">1 часа нежности, где вы режиссер и звезда среди всего происходящего</div>
				<div class="item">Наслаждайтесь приватной и комфортной встречей в вашем номере в отеле</div>
				<div class="item">Невероятный опыт вам обеспечен, а необыкновенные фантазии станут реальностью.</div>
				<div class="item last">Гарантированное удовлетворение!</div>
			</div>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">ВСЕ ЭТО ПО ЦЕНЕ, В КОТОРУЮ ВСЕ ВКЛЮЧЕНО.</h2>
			<p>Зачем  тратить свое драгоценное время и деньги на стандартный тур по Паттайе? Загляните в <?php echo $cf->get('siteName'); ?> и вы узнаете, что действительно означает настоящее Тайское удовольствие.</p>
			<div>&nbsp;</div>
			<p><?php echo $cf->get('siteName'); ?> предлагает каждому мужчине, женщине или паре, находящимся в поиске страсти или удовольствия, опыт, который стоит испытать по крайней мере один раз в жизни.</p>
			<div>&nbsp;</div>
			<p>В <?php echo $cf->get('siteName'); ?> мы делаем все для того, чтобы сделать ваши впечатления незабываемыми. Мы ценим ваши идеи и мнение об услугах. Свяжитесь с нами по электронной почте <a href="mailto:<?php echo $bookingEmail; ?>"><?php echo $bookingEmail; ?></a>. Если вы ищите, что-то особенное, мы попытаемся вам помочь.</p>
			<div>&nbsp;</div>
			<p><strong class="text_yellow">Уровень А:</strong> некоторые из наших девушек готовы предоставить услуги уровня А (за дополнительную плату. Пожалуйста, ознакомьтесь с ценами).</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">УНИФОРМА ДЕВУШЕК</h2>
			<p>Мы предлагаем целый список сексуальной униформы. Внизу представлены варианты, нетребующие дополнительной платы и способные сделать воспоминания более яркими</p>
			<div>&nbsp;</div>
			<div class="list_normal">
				<div class="item">Школьница</div>
				<div class="item">Стюардеса</div>
				<div class="item">Полицейский</div>
				<div class="item">Французская горничная</div>
				<div class="item">Медсестра</div>
				<div class="item last">Чулки</div>
			</div>
			<div>&nbsp;</div>
			<p>Вы также можете использовать свою собственную униформу. Devil's Den escorts существует для того, чтобы доставлять удовольствие.</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">КАК ЗАБРОНИРОВАТЬ <?php echo $cf->get('siteName'); ?></h2>
			<p>Вы можете отправить электронное письмо на <a href="mailto:<?php echo $bookingEmail; ?>"><?php echo $bookingEmail; ?></a>, выбрав кнопку ЗАБРОНИРОВАТЬ СЕЙЧАС, которую можно найти на кажой странице.</p>
			<div>&nbsp;</div>
			<p>Также, вы можете позвонить нам днем с 12 утра до 10 вечера по номеру #<?php echo $sitePhone; ?></p>

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