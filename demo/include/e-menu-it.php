<?php $menu[str_replace('-', '_', $pageName)] = 'active'; ?>
<div id="e_menu" class="fixed_it">
	<div class="content_res">
		<div class="_button">
			<a href="javascript:void(0);">Menu</a>
		</div>
		<div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/home.html'; ?>" title="Home" class="<?php echo $menu['home']; ?>">Home</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/clients.html'; ?>" title="Clienti" class="<?php echo $menu['clients']; ?>">Clienti</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="Profili" class="<?php echo $menu['profiles']; ?>">Profili</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/rates.html'; ?>" title="Tariffe" class="<?php echo $menu['rates']; ?>">Tariffe</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/services.html'; ?>" title="Servizi" class="<?php echo $menu['services']; ?>">Servizi</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/vip-packages.html'; ?>" title="Pacchetti VIP" class="<?php echo $menu['vip_packages']; ?>">Pacchetti VIP</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/booking.html'; ?>" title="Prenotazioni" class="<?php echo $menu['booking']; ?>">Prenotazioni</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/faq.html'; ?>" title="FAQ" class="<?php echo $menu['faq']; ?>">FAQ</a>
		</div>
	</div>
</div>