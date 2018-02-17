<?php $menu[str_replace('-', '_', $pageName)] = 'active'; ?>
<div id="e_menu" class="fixed_es">
	<div class="content_res">
		<div class="_button">
			<a href="javascript:void(0);">Menú</a>
		</div>
		<div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/home.html'; ?>" title="PRINCIPAL" class="<?php echo $menu['home']; ?>">PRINCIPAL</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/clients.html'; ?>" title="CLIENTES" class="<?php echo $menu['clients']; ?>">CLIENTES</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="PERFILES" class="<?php echo $menu['profiles']; ?>">PERFILES</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/rates.html'; ?>" title="TARIFAS" class="<?php echo $menu['rates']; ?>">TARIFAS</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/services.html'; ?>" title="SERVICIOS" class="<?php echo $menu['services']; ?>">SERVICIOS</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/vip-packages.html'; ?>" title="PAQUETES VIP" class="<?php echo $menu['vip_packages']; ?>">PAQUETES VIP</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/booking.html'; ?>" title="APARTAR" class="<?php echo $menu['booking']; ?>">APARTAR</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/faq.html'; ?>" title="FAQ" class="<?php echo $menu['faq']; ?>">FAQ</a>
		</div>
	</div>
</div>