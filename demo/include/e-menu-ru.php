<?php $menu[str_replace('-', '_', $pageName)] = 'active'; ?>
<div id="e_menu" class="fixed_ru">
	<div class="content_res">
		<div class="_button">
			<a href="javascript:void(0);">Главное меню</a>
		</div>
		<div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/home.html'; ?>" title="ДОМАШНЯЯ СТРАНИЦА" class="<?php echo $menu['home']; ?>">ДОМАШНЯЯ СТРАНИЦА</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/clients.html'; ?>" title="КЛИЕНТЫ" class="<?php echo $menu['clients']; ?>">КЛИЕНТЫ</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="ПРОФИЛИ" class="<?php echo $menu['profiles']; ?>">ПРОФИЛИ</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/rates.html'; ?>" title="ЦЕНЫ" class="<?php echo $menu['rates']; ?>">ЦЕНЫ</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/services.html'; ?>" title="УСЛУГИ" class="<?php echo $menu['services']; ?>">УСЛУГИ</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/vip-packages.html'; ?>" title="ВИП ПАКЕТЫ" class="<?php echo $menu['vip_packages']; ?>">ВИП ПАКЕТЫ</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/booking.html'; ?>" title="БРОНИРОВАНИЕ" class="<?php echo $menu['booking']; ?>">БРОНИРОВАНИЕ</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/faq.html'; ?>" title="ВОПРОСЫ И ОТВЕТЫ" class="<?php echo $menu['faq']; ?>">ВОПРОСЫ И ОТВЕТЫ</a>
		</div>
	</div>
</div>