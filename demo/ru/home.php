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
			<div class="banner fixed_ru">
				<div class="img">
					<img src="<?php echo $fullUrl.'image/banner.png'; ?>" width="100%" alt="banner.jpg" />
				</div>

				<div class="fix_button small oswald">
					<div class="left inline">&nbsp;</div><!--
					--><div class="body inline">
						<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="ВОЙДИТЕ В НАШУ ГАЛЕРЕЮ">ВОЙДИТЕ В НАШУ ГАЛЕРЕЮ</a>
					</div><!--
					--><div class="right inline">&nbsp;</div>
				</div>
			</div>

			<h1 class="title text_yellow give_space15"><strong>ДОБРО ПОЖАЛОВАТЬ В <?php echo $cf->get('siteName'); ?></strong></h1>
			<p>На протяжении 10 лет Devil's Den Thailand успел зарекомендовать себя как один из ведущих поставщиков развлечений для взрослых в Таиланде. Известный своей честностью, он установил для других стандарт проверки здоровья в больницах, имеющих международную лицензию.</p>
			<div>&nbsp;</div>
			<p>Учитывая то, что сегодня, в меняющиеся и сложные времена находятся те, кто предпочитает пользоваться нашими.услугами в уединенной атмосфере собственной квартиры. Devil's Den решил, что сейчас самое подходящее время для того, чтобы расширить список наших премиальных услуг для удовлетворения этой потребности.</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">МЫ ГАРАНТИРУЕМ:</h2>
			<p>1. То, что все  девушки сдают ежемесячный анализ крови, а также раз в две недели сдают мазок на  ВИЧ и ЗППП в авторитетной международной больнице. А текущие результаты публикуются в профиле девушек.</p>
			<div>&nbsp;</div>
			<p>2. То, что все фотографии девушек являются подлинными, и не подвергаются каким-либо изменениям при помощи фоторедакторов.</p>
			<div>&nbsp;</div>
			<p>3. То, что услуги, предлагаемые отдельными девушками, предоставляются по желанию.</p>
			<div>&nbsp;</div>
			<p class="text_yellow text_center"><strong><?php echo $cf->get('siteName'); ?>: Место, где фантазии становятся реальностью</strong></p>
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
