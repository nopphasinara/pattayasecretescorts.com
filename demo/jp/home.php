<?php
	require($fullRoot.'include/html-top.php');
?>
<!--e_top-->
<?php require($fullRoot.'include/e-top-'.$sysLang.'.php'); ?>
<!--/e_top-->

<!--e_menu-->
<?php require($fullRoot.'include/e-menu-'.$sysLang.'.php'); ?>
<!--/e_menu-->

<!--e_slide-->
<?php require($fullRoot.'include/e-slide-'.$sysLang.'.php'); ?>
<!--/e_slide-->

<!--e_wrapper-->
<div id="e_wrapper">
	<div class="content_res">
		<!--e_left-->
		<?php require($fullRoot.'include/e-left-'.$sysLang.'.php'); ?>
		<!--/e_left-->

		<!--e_content-->
		<div id="e_content">
			<div class="banner">
				<div class="img">
					<img src="<?php echo $fullUrl.'image/banner.png'; ?>" width="100%" alt="banner.jpg" />
				</div>

				<div class="fix_button small oswald">
					<div class="left inline">&nbsp;</div><!--
					--><div class="body inline">
						<a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="ギャラリーを見る"><span class="text_white">ギャラリーを見る</span></a>
					</div><!--
					--><div class="right inline">&nbsp;</div>
				</div>
			</div>

			<h1 class="title text_yellow give_space15"><strong><?php echo $cf->get('siteName'); ?> へようこそ</strong></h1>
			<p><?php echo $cf->get('siteName'); ?> は 10 年以上に渡り、アダルト・エンターテイメント提供者としてタイをリードして参りました。私達の誠実さと清廉さは、国際的に認定されている病院での定期的な健康診断へとつながり、この意識の高さは業界で目指すべき基準となっております。</p>
			<div>&nbsp;</div>
			<p>お客様のニーズやご要望は常に変わっていくものでございます。近年ではご自身の宿泊先でサービスのご利用を希望される方が増えてまいりました。そこで私たちは、そのニーズに応えるためにプレミアムサービスの展開を決意いたしました。</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">私たちは以下の点を保障いたします：</h2>
			<p>１．エスコート達は全員、月に１回の血液検査と２週間に１回の細胞診を行い、HIVおよびSTDの検査を行っております。これらの検査は信頼できる国際病院で行われており、結果はエスコートのプロフィールにて公開しております。</p>
			<div>&nbsp;</div>
			<p>２．プロフィールの写真はすべて本人のものであり、画像処理などによる編集は一切しておりません。</p>
			<div>&nbsp;</div>
			<p>３．それぞれのエスコートがお約束したサービスは必ず行います。</p>
			<div>&nbsp;</div>
			<p class="text_yellow text_center"><strong><?php echo $cf->get('siteName'); ?>: あなたの夢が叶う場所</strong></p>
		</div>
		<!--/e_content-->

		<!--e_right-->
		<?php require($fullRoot.'include/e-right-'.$sysLang.'.php'); ?>
		<!--/e_right-->

		<div class="clear"></div>
	</div>
</div>
<!--/e_wrapper-->

<!--e_footer-->
<?php require($fullRoot.'include/e-footer-'.$sysLang.'.php'); ?>
<!--/e_footer-->
<?php
	require($fullRoot.'include/html-bottom.php');
?>
