<?php $menu[str_replace('-', '_', $pageName)] = 'active'; ?>
<div id="e_menu">
	<div class="content_res">
		<div class="_button">
			<a href="javascript:void(0);">Main Menu</a>
		</div>
		<div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/home.html'; ?>" title="Home" class="<?php echo $menu['home']; ?>">Home</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="Profiles" class="<?php echo $menu['profiles']; ?>">GALLERY</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/services.html'; ?>" title="Services" class="<?php echo $menu['services']; ?>">SERVICES</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/rates.html'; ?>" title="Rates" class="<?php echo $menu['rates']; ?>">RATES</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/booking.html'; ?>" title="Booking" class="<?php echo $menu['booking']; ?>">BOOKING</a>
		</div>
	</div>
</div>
