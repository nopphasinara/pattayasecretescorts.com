<?php $menu[str_replace('-', '_', $pageName)] = 'active'; ?>
<div id="e_menu" class="fixed_kr">
	<div class="content_res">
		<div class="_button">
			<a href="javascript:void(0);">주 메뉴</a>
		</div>
		<div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/home.html'; ?>" title="홈" class="<?php echo $menu['home']; ?>">홈</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/clients.html'; ?>" title="고객" class="<?php echo $menu['clients']; ?>">고객</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="프로필" class="<?php echo $menu['profiles']; ?>">프로필</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/rates.html'; ?>" title="비용" class="<?php echo $menu['rates']; ?>">비용</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/services.html'; ?>" title="서비스" class="<?php echo $menu['services']; ?>">서비스</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/vip-packages.html'; ?>" title="VIP 패키지" class="<?php echo $menu['vip_packages']; ?>">VIP 패키지</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/booking.html'; ?>" title="예약" class="<?php echo $menu['booking']; ?>">예약</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/faq.html'; ?>" title="질문요약" class="<?php echo $menu['faq']; ?>">질문요약</a>
		</div>
	</div>
</div>