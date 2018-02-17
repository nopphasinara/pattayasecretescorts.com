<?php $menu[str_replace('-', '_', $pageName)] = 'active'; ?>
<div id="e_menu" class="ge_fixed">
	<div class="content_res">
		<div class="_button">
			<a href="javascript:void(0);">Hauptmenü</a>
		</div>
		<div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/home.html'; ?>" title="Startseite" class="<?php echo $menu['home']; ?>">Startseite</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/clients.html'; ?>" title="Unsere Kunden" class="<?php echo $menu['clients']; ?>">Unsere Kunden</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="Profiles" class="<?php echo $menu['profiles']; ?>">Profiles</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/rates.html'; ?>" title="Preise" class="<?php echo $menu['rates']; ?>">Preise</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/services.html'; ?>" title="Leistungen" class="<?php echo $menu['services']; ?>">Leistungen</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/vip-packages.html'; ?>" title="VIP-Pakete" class="<?php echo $menu['vip_packages']; ?>">VIP-Pakete</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/booking.html'; ?>" title="Buchung" class="<?php echo $menu['booking']; ?>">Buchung</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/faq.html'; ?>" title="FAQ" class="<?php echo $menu['faq']; ?>">FAQ</a>
		</div>
	</div>
</div>