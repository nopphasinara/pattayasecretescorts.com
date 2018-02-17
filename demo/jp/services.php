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
			<h1 class="title text_yellow give_space10"><strong>サービス</strong></h1>
			<h2 class="subtitle text_yellow give_space15">想像してみてください！</h2>
			<div class="list_normal">
				<div class="item">あなたが選んだ美しいタイ女性。一人でも、二人でも、何人でも。</div>
				<div class="item">1時間（もしくはそれ以上）の幸せ。あなたがすべてのデイレクター、そしてスターです。</div>
				<div class="item">快適でプライバシーが守られる、ホテルのお部屋で</div>
				<div class="item">最高の経験、そして一生分の夢が叶えられる</div>
				<div class="item last">満足度保障！</div>
			</div>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">これらすべてが全部込み、一律料金で</h2>
			<p>平均的なタイのサービスにあなたの貴重な時間とお金を無駄にする必要はございません。<?php echo $cf->get('siteName'); ?>のエスコートなら最高峰のタイのおもてなしが体験できます。 </p>
			<div>&nbsp;</div>
			<p><?php echo $cf->get('siteName'); ?>は情熱と快楽を求めるすべての男性、女性、カップルに一度は体験すべき夜をご提供しております。</p>
			<div>&nbsp;</div>
			<p><?php echo $cf->get('siteName'); ?> では、忘れられない時間をご提供するため、あなたのアイディアやサービスに対するご意見を大切にしております。具体的なサービスをお求めの方は<a href="mailto:<?php echo $bookingEmail; ?>" title="<?php echo $bookingEmail; ?>"><?php echo $bookingEmail; ?></a> までご相談ください。</p>
			<div>&nbsp;</div>
			<p><strong class="text_yellow">Ａレベル：</strong> Ａレベルのサービスを提供できるエスコートもおります。（追加料金有り、詳しくはご料金のページをご覧ください。）</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">エスコート衣装</h2>
			<p>私たちはセクシーな衣装を数多くご用意しております。追加料金はございません。エスコートとの夜をより思い出深いものにしたい方は是非ご利用ください。</p>
			<div>&nbsp;</div>
			<div class="list_normal">
				<div class="item">女子学生</div>
				<div class="item">フライトアテンダント</div>
				<div class="item">警察</div>
				<div class="item">メイド</div>
				<div class="item">ナース</div>
				<div class="item last">ストッキング</div>
			</div>
			<div>&nbsp;</div>
			<p>もちろん、ご自身で衣装をご用意されても結構です。Devil's Denのエスコートの役割はあなたに快楽を与えることです！</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">ご予約方法</h2>
			<p>「今すぐ予約する」ボタンをクリックして、<a href="mailto:<?php echo $bookingEmail; ?>" title="<?php echo $bookingEmail; ?>"><?php echo $bookingEmail; ?></a> までメールをご送信ください。</p>
			<div>&nbsp;</div>
			<p>お電話でのお問い合わせは #<?php echo $sitePhone; ?> （12:00～22:00）までどうぞ。</p>

			<?php require($fullRoot.'include/button-booking.php'); ?>
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