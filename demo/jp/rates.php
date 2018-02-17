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
			<h1 class="title text_yellow give_space15"><strong>ご料金</strong></h1>
			<div class="list_rates">
				<div class="list_title">
					<div class="col col1 inline">時間</div><!--
					--><div class="col col2 inline">タイプ</div><!--
					--><div class="col col3 inline">料金</div><!--
					--><div class="col col4 inline">余分な女性を追加</div>
				</div>
				<div class="item">
					<div class="col col1 inline">1 時間</div><!--
					--><div class="col col2 inline">プレイ回数無制限</div><!--
					--><div class="col col3 inline">4,000 THB</div><!--
					--><div class="col col4 inline">+3,000 THB</div>
				</div>
				<div class="item">
					<div class="col col1 inline">1.5 時間</div><!--
					--><div class="col col2 inline">プレイ回数無制限</div><!--
					--><div class="col col3 inline">5,000 THB</div><!--
					--><div class="col col4 inline">+4,000 THB</div>
				</div>
				<div class="item">
					<div class="col col1 inline">2 時間</div><!--
					--><div class="col col2 inline">プレイ回数無制限</div><!--
					--><div class="col col3 inline">6,000 THB</div><!--
					--><div class="col col4 inline">+5,000 THB</div>
				</div>
				<div class="item">
					<div class="col col1 inline">夜パック（午後８時～午前８時）</div><!--
					--><div class="col col2 inline">プレイ回数無制限</div><!--
					--><div class="col col3 inline">10,000 THB</div><!--
					--><div class="col col4 inline">+8,000 THB</div>
				</div>
				<div class="item last">
					<div class="col col1 inline">24 時間</div><!--
					--><div class="col col2 inline">プレイ回数無制限</div><!--
					--><div class="col col3 inline">15,000 THB</div><!--
					--><div class="col col4 inline">+12,000 THB</div>
				</div>
			</div>

			<div>&nbsp;</div>
			<h2 class="subtitle text_yellow give_space15"><strong>カップル（夫/妻）</strong></h2>
			<div class="list_rates">
				<div class="item">
					<div class="col col1 inline">1 時間</div><!--
					--><div class="col col2 inline">プレイ回数無制限</div><!--
					--><div class="col col3 inline">6,000 THB</div><!--
					--><div class="col col4 inline">+5,000 THB</div>
				</div>
				<div class="item">
					<div class="col col1 inline">1.5 時間</div><!--
					--><div class="col col2 inline">プレイ回数無制限</div><!--
					--><div class="col col3 inline">7,000 THB</div><!--
					--><div class="col col4 inline">+6,000 THB</div>
				</div>
				<div class="item">
					<div class="col col1 inline">2 時間</div><!--
					--><div class="col col2 inline">プレイ回数無制限</div><!--
					--><div class="col col3 inline">8,000 THB</div><!--
					--><div class="col col4 inline">+7,000 THB</div>
				</div>
				<div class="item">
					<div class="col col1 inline">夜パック（午後８時～午前８時）</div><!--
					--><div class="col col2 inline">プレイ回数無制限</div><!--
					--><div class="col col3 inline">12,000 THB</div><!--
					--><div class="col col4 inline">+10,000 THB</div>
				</div>
				<div class="item last">
					<div class="col col1 inline">24 時間</div><!--
					--><div class="col col2 inline">プレイ回数無制限</div><!--
					--><div class="col col3 inline">18,000 THB</div><!--
					--><div class="col col4 inline">+14,000 THB</div>
				</div>
			</div>

			<div>&nbsp;</div>
			<h2 class="subtitle text_yellow give_space15"><strong>A-LEVEL：追加料金予約あたりの護衛あたり2000バーツ。</strong></h2>
			<div>&nbsp;</div>

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