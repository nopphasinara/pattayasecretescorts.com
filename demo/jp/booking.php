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
			<h1 class="title text_yellow give_space15"><strong>ご予約</strong></h1>
			<h2 class="subtitle text_yellow give_space15">予約は当ウェブサイトに掲載しているリンクよりメールをご送信ください。電話でのお問い合わせも承っております。</h2>
			<p>ご料金につきましては「ご料金」のページをご覧ください。値段の交渉等はいたしかねますのでご了承ください。</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">お支払いは以下２つの方法がございます：</h2>
			<p>Ａ）エスコートと待ち合わせ後、10分以内</p>
			<div>&nbsp;</div>
			<p>もしくは</p>
			<div>&nbsp;</div>
			<p>Ｂ）クレジットカードを経由して私たちのPayPalアカウントに全額支払います。</p>
			<div>&nbsp;</div>
			<p>通貨の間違い・金額の間違い等のトラブルを防ぐため、エスコートとの待ち合わせ後10分以内にタイバーツでのお支払いをお願いしております。待ち合わせをした時点でサービス開始とみなされます。お早目にお支払いを済まし、エスコートと有意義な時間をお過ごしください。待ち合わせ後、10分以内に全額のお支払いがなかった場合はキャンセルとみなされます。この場合、エスコートはキャンセル料をいただき、退席いたしますのでご了承ください。</p>
			<div>&nbsp;</div>
			<p>エスコートが到着後のキャンセルは、いかなる場合においても、交通費として1,000バーツをお支払い頂きます。エスコートが待ち合わせ場所に向かっている途中でキャンセルをした場合も同様です。ご注意ください。</p>
			<div>&nbsp;</div>
			<p>予約をした時点で、これらの規約に同意したことになります。</p>
			<div>&nbsp;</div>
			<p>予約はお客様のホテルの部屋番号が確認でき、ホテルの電話を使ってお客様とご連絡がとれた後のみ確定されます。事前予約も可能ですが、お客様のフルネーム、ホテル名、ホテルの部屋番号が必要となります。</p>
			<div>&nbsp;</div>
			<p>バンコクの交通状況を配慮し、ご希望のお時間の1時間前にご予約していただくことを推奨しております。</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">事前予約</h2>
			<p>事前の予約の場合、50％のデポジットが必要とされ、支払いはクレジットカードを経由して私たちのPayPalアカウントにあります。その他のお支払い方法につきましては、ご連絡くださいませ。残高はエスコートとの待ち合わせ後にお支払いいただきます。</p>
			<div>&nbsp;</div>
			<p>予約した終了時間を過ぎた場合、エスコートの同意があれば延長することができます。その際は、ご料金表に従って追加料金が発生いたします。</p>
			<div>&nbsp;</div>
			<p>表示されているご料金はすべて込みのものですので、チップはお支払いいただかなくて結構でございます。ただ、特にエスコートのサービスがお気に召した場合、チップとしてその意を伝えていただいても構いません。</p>
			<div>&nbsp;</div>
			<p>エスコートは２人以上の男性とお会いすることはできません。他の方がいる部屋でのサービスはいたしかねますのでご了承ください。万一男性が1人いた場合、２時間分のご料金をお支払いいただき、エスコートは退室いたします。</p>
			<div>&nbsp;</div>
			<p>「カップル」とは男性とそのパートナーの女性のことを指します。エスコートの健康管理のため、アダルト・エンターテイメントの業界でお仕事をされている女性へのサービスはいたしかねます。ご了承ください。</p>
			<div>&nbsp;</div>
			<p>ご料金はエスコートと過ごす時間分をお支払いいただいております。この間の行動はお客様とエスコートの同意によってお決めください。</p>
			<div>&nbsp;</div>
			<p><?php echo $cf->get('siteName'); ?> はあなたを満足させるために全力を尽くします！エスコートには敬意を払っていただきますようお願いいたします。</p>

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