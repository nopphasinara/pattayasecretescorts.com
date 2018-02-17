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
			<h1 class="title text_yellow give_space10"><strong>服务</strong></h1>
			<h2 class="subtitle text_yellow give_space15">拍下这一刻！</h2>
			<div class="list_normal">
				<div class="item">你可以根据自己的想法选择一个、两个、或者许多漂亮的泰国女郎。</div>
				<div class="item">1小时（或者更长时间）的放纵，你是在这期间所发生每件事情的总监、以及明星。</div>
				<div class="item">在你酒店的房间尽享舒适、以及隐私。</div>
				<div class="item">可为您带来终极的体验、以及实现一生的梦想。</div>
				<div class="item last">保证满意！</div>
			</div>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">所有这些仅需支付包括所有服务的统一价格。</h2>
			<p>为什么要把您定期泰国旅行所花费的宝贵的时间和金钱浪费呢？ 参观<?php echo $cf->get('siteName'); ?>会让您体验到泰国真正的乐事。</p>
			<div>&nbsp;</div>
			<p><?php echo $cf->get('siteName'); ?>可让每一个男士、女士、或者情侣寻找到一生仅有一次的激情、以及乐事。</p>
			<div>&nbsp;</div>
			<p>我们在<?php echo $cf->get('siteName'); ?>致力于给您带来难以忘记的体验，因此我们非常重视您的想法、以及对我们服务的意见。 您可以通过发送电子邮件到<a href="mailto:<?php echo $bookingEmail; ?>"><?php echo $bookingEmail; ?></a>，联系我们。如果您正在寻找一项具体的服务，我们会尝试向您提供服务、以满足您的需求。</p>
			<div>&nbsp;</div>
			<p><strong class="text_yellow">A－级:</strong> 我们部分应召女郎可以提供A-级服务（需要支付附加费用，请在费率表中查看这些费用）。</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">应召女郎制服</h2>
			<p>我们可提供多种性感的制服。 这些无需支付额外的费用，并且可让您的体验更加难忘。</p>
			<div>&nbsp;</div>
			<div class="list_normal">
				<div class="item">学妹</div>
				<div class="item">航空小姐</div>
				<div class="item">女警</div>
				<div class="item">法国女仆</div>
				<div class="item">护士</div>
				<div class="item last">长袜</div>
			</div>
			<div>&nbsp;</div>
			<p>也可以向您免费向您提供您自己的制服。 Devil's Den escorts在这里期待为您服务！</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">如何预订 Devil's Den 曼谷应召女郎</h2>
			<p>您可以通过点击在每个页面上显示的现在预订发送电子邮件到<a href="mailto:<?php echo $bookingEmail; ?>"><?php echo $bookingEmail; ?></a>。</p>
			<div>&nbsp;</div>
			<p>另外，您也可以在12:00到22:00时段拨打电话#<?php echo $sitePhone; ?>。</p>

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