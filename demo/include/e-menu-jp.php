<?php $menu[str_replace('-', '_', $pageName)] = 'active'; ?>
<div id="e_menu" class="jp_fixed">
	<div class="content_res">
		<div class="_button">
			<a href="javascript:void(0);">メインメニュー</a>
		</div>
		<div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/home.html'; ?>" title="ホーム" class="<?php echo $menu['home']; ?>">ホーム</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/clients.html'; ?>" title="お客様" class="<?php echo $menu['clients']; ?>">お客様</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="プロフィール" class="<?php echo $menu['profiles']; ?>">プロフィール</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/rates.html'; ?>" title="ご料金" class="<?php echo $menu['rates']; ?>">ご料金</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/services.html'; ?>" title="サービス" class="<?php echo $menu['services']; ?>">サービス</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/vip-packages.html'; ?>" title="VIPパッケージ" class="<?php echo $menu['vip_packages']; ?>">VIPパッケージ</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/booking.html'; ?>" title="ご予約" class="<?php echo $menu['booking']; ?>">ご予約</a>
		</div><!--
		--><div class="seperate inline">&nbsp;</div><!--
		--><div class="inline">
			<a href="<?php echo $fullUrl.$sysLang.'/faq.html'; ?>" title="よくあるご質問" class="<?php echo $menu['faq']; ?>">よくあるご質問</a>
		</div>
	</div>
</div>