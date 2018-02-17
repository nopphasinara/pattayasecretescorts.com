<?php $menu[str_replace('-', '_', $pageName)] = 'active'; ?>
<div id="e_menu">
	<div class="content_res">
		<div class="_button">
			<a href="javascript:void(0);">เมนูหลัก</a>
		</div>
		<div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/home.html'; ?>" title="หน้าหลัก" class="<?php echo $menu['home']; ?>">หน้าหลัก</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/clients.html'; ?>" title="ลูกค้า" class="<?php echo $menu['clients']; ?>">ลูกค้า</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="โปรไฟล์" class="<?php echo $menu['profiles']; ?>">โปรไฟล์</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/rates.html'; ?>" title="ค่าบริการ" class="<?php echo $menu['rates']; ?>">ค่าบริการ</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/services.html'; ?>" title="บริการ" class="<?php echo $menu['services']; ?>">บริการ</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/vip-packages.html'; ?>" title="VIP แพ๊คเกจ" class="<?php echo $menu['vip_packages']; ?>">VIP แพ๊คเกจ</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/booking.html'; ?>" title="การจอง" class="<?php echo $menu['booking']; ?>">การจอง</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/faq.html'; ?>" title="คำถามทั่วไป" class="<?php echo $menu['faq']; ?>">คำถามทั่วไป</a>
		</div>
	</div>
</div>