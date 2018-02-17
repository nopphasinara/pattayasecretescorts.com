<?php $menu[str_replace('-', '_', $pageName)] = 'active'; ?>
<div id="e_menu">
	<div class="content_res">
		<div class="_button">
			<a href="javascript:void(0);">القائمة الرئيسية</a>
		</div>
		<div class="inline" dir="rtl">
			<a href="<?php echo $fullUrl.$sysLang.'/home.html'; ?>" title="الصفحة الرئيسية" class="<?php echo $menu['home']; ?>">الصفحة الرئيسية</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline" dir="rtl">
			<a href="<?php echo $fullUrl.$sysLang.'/clients.html'; ?>" title="العملاء" class="<?php echo $menu['clients']; ?>">العملاء</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline" dir="rtl">
			<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="البروفايلات" class="<?php echo $menu['profiles']; ?>">البروفايلات</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline" dir="rtl">
			<a href="<?php echo $fullUrl.$sysLang.'/rates.html'; ?>" title="الرسوم" class="<?php echo $menu['rates']; ?>">الرسوم</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline" dir="rtl">
			<a href="<?php echo $fullUrl.$sysLang.'/services.html'; ?>" title="الخدمات" class="<?php echo $menu['services']; ?>">الخدمات</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline" dir="rtl">
			<a href="<?php echo $fullUrl.$sysLang.'/vip-packages.html'; ?>" title=" المهمين جداً (VIP)" class="<?php echo $menu['vip_packages']; ?>"> المهمين جداً (VIP)</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline" dir="rtl">
			<a href="<?php echo $fullUrl.$sysLang.'/booking.html'; ?>" title="الحجز" class="<?php echo $menu['booking']; ?>">الحجز</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline" dir="rtl">
			<a href="<?php echo $fullUrl.$sysLang.'/faq.html'; ?>" title="روحة دائماً" class="<?php echo $menu['faq']; ?>">روحة دائماً</a>
		</div>
	</div>
</div>