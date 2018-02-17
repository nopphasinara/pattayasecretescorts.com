<?php $menu[str_replace('-', '_', $pageName)] = 'active'; ?>
<div id="e_menu" class="fr_fixed">
	<div class="content_res">
		<div class="_button">
			<a href="javascript:void(0);">Menu</a>
		</div>
		<div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/home.html'; ?>" title="ACCUEIL" class="<?php echo $menu['home']; ?>">ACCUEIL</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/clients.html'; ?>" title="CLIENTS" class="<?php echo $menu['clients']; ?>">CLIENTS</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="PROFILS" class="<?php echo $menu['profiles']; ?>">PROFILS</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/rates.html'; ?>" title="TARIFS" class="<?php echo $menu['rates']; ?>">TARIFS</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/services.html'; ?>" title="SERVICES" class="<?php echo $menu['services']; ?>">SERVICES</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/vip-packages.html'; ?>" title="PACKS VIP" class="<?php echo $menu['vip_packages']; ?>">PACKS VIP</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/booking.html'; ?>" title="RÉSERVATION" class="<?php echo $menu['booking']; ?>">RÉSERVATION</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/faq.html'; ?>" title="FAQ" class="<?php echo $menu['faq']; ?>">FAQ</a>
		</div>
	</div>
</div>