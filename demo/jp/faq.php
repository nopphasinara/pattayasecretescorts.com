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
			<h1 class="title text_yellow give_space10"><strong>よくあるご質問</strong></h1>
			<h2 class="subtitle text_yellow give_space15">よくあるご質問</h2>
			<strong>Ｑ：カップルですが、ご利用できますか？</strong>
			<br />
			Ａ：はい、もちろんです。Devil's Denは元々カップルが第三者とのプレイを実現するために生まれた場所です。カップルやスウィンガー、シングル女性も私達の大切なお客様でございます。
			<br /><br />
			<strong>Ｑ：どのように健康管理をしているのですか？</strong>
			<br />	Ａ：私達のエスコートは、他者との接触が多い医療関係者と同等の健康管理をしております。エスコート達は全員診療記録を持っていて、月に１回のHIV検査・１週間に１回のSTD検査を受けております。これらの記録をスキャンしたものがこのウェブサイトに掲載されています。また、実物をお見せすることもできますので、ご希望の方はお気軽におっしゃってください。
			<br /><br />
			<strong>Ｑ：モラル的にはいかがなんでしょうか・・・？</strong>
			<br />	Ａ：私達は問題ないと考えております。タイでは貧困があまりなく、国が管理している医療のシステムもしっかりしています。仕事を見つけるのも難しくなく、生活費も安く済みます。強要されてアダルト・エンターテイメントの仕事をしている女性はごく僅かです。数多くある仕事の中で、高収入の仕事として選択肢になっています。私達のスタッフは仕事を楽しんでいて、偽れないその様子は、口コミからうかがうことができます。
			<br /><br />
			エスコートという道を選ぶ女性のほとんどは、数年働いたのち、自らの会社やビジネスを始めるために貯金を使っています。
			<br /><br />
			<strong>Ｑ：カード払いはできますか？</strong>
			<br />
			Ａ：私たちは、ペイパルアカウントに支払わクレジットカードを受け入れることができます。
			<br /><br />
			<strong>Ｑ：利用するにあたって、何か条件はありますか？</strong>
			<br />
			Ａ：18歳以上のお客様のみ、<?php echo $cf->get('siteName'); ?> をご利用できます。
			<br /><br />
			<strong>Ｑ：私はインド系・アフリカ系・中東系ですが・・・</strong>
			<br />	Ａ：私たちは礼儀正しく、教養のある男性・女性・カップルの方達を人種、肌の色、宗教にかかわらずお迎えしております。エスコート達に敬意を払い、親切に接していただける方であれば、どなたでも歓迎しております。反対に、それに従っていただけない方は、出身地がどこであれサービスをお断りいたします。ご了承ください。
			<br /><br />
			<strong>Ｑ：写真や動画を撮ってもいいですか？</strong>
			<br />	Ａ：いいえ、写真や動画の撮影は一切お断りしております。タイの法律上、このような行為は固く禁じられております。過去にお客様がエスコートの写真をインターネット上にあげるトラブルが発生いたしました。このようなトラブルを防ぐため、皆様のご理解とご協力をお願いいたします。
			<br /><br />
			<strong>Ｑ：割引はありますか？</strong>
			<br />
			Ａ：いいえ、残念ながら割引は一切ございません。私達が設定しているご料金にはエスコートとお客様のご健康を守るために徹底している、検査等の費用が含まれております。また、エスコート達の高いスキルも反映しております。ご理解、ご協力をお願いいたします。

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