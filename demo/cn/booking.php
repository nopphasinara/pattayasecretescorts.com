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
			<h1 class="title text_yellow give_space15"><strong>预订</strong></h1>
			<h2 class="subtitle text_yellow give_space15">可以通过这个网站上的链接发送电子邮件、或者拨打显示的电话号码两种方法来预订。</h2>
			<p>所有的费用都显示在费用页面中。 请注意，费用是不可讨价还价的。</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">付款应当：:</h2>
			<p>A. 在见到您的约会对象之后10分钟之内立即付款。</p>
			<div>&nbsp;</div>
			<p>或者</p>
			<div>&nbsp;</div>
			<p>B. 通過信用卡全額我們的PayPal帳戶支付。</p>
			<div>&nbsp;</div>
			<p>为了避免出现付款的金额、或者币种出现错误，我们要求在见到您的约会对象之后的10分钟以内以泰铢支付您的全额款项。 当你们会面时时间就开始计算，因此尝试延迟支付款项，只能减少你享受你的应召女郎所提供服务的时间。 如果客户在会面之后的10分钟内没有支付全额款项，我们的应召女郎会被指示索要取消费用、并且离开。</p>
			<div>&nbsp;</div>
			<p>在应召女郎到达之后基于任何理由的取消会被收取1,000 泰铢，以补偿她的交通费用。 如果应召女郎已经乘坐出租车在前往您下榻酒店的途中您要取消一次预订，也要收取取消费用。</p>
			<div>&nbsp;</div>
			<p>当进行预订时，你同意这些条款。</p>
			<div>&nbsp;</div>
			<p>我们在检查你的酒店房间好吗、以及通过酒店的固定电话和你通话之前，预订不能得到确认。 可进行暂时性的预订，但是会要求您向我们提供您的全名、酒店和房间号码。</p>
			<div>&nbsp;</div>
			<p>理想的情況是，由於普吉島的地理面積，你應該嘗試預訂所需預約時間前至少1小時。</p>

			<div>&nbsp;</div><div>&nbsp;</div>

			<h2 class="subtitle text_yellow give_space15">提前预订</h2>
			<p>對於提前預約，50％的押金和支付通過信用卡是我們的PayPal帳戶。請與我們聯繫的其他方式，使50％的定金。當您使用保駕護航滿足支付的其餘部分將進行。</p>
			<div>&nbsp;</div>
			<p>针对最初预订时间的任何延期在获得应召女郎同意的情形下会按照发布的费率收取费用。</p>
			<div>&nbsp;</div>
			<p>不需要支付小费，这是因为已经收取了全包费用。 然而，如果你认为应召女郎满足您的期望，欢迎支付少量的小费以表示感觉。</p>
			<div>&nbsp;</div>
			<p>应召女郎不会和超过一位男士进行会面，并且会面不能在有其他客人参与的共用房间中进行。 如果出现这种情况，会要求支付1小时预订的款项，并且应召女郎会立即离开。</p>
			<div>&nbsp;</div>
			<p>词语“情侣”指的是男士和他的女性伴侣。 由于我们采用非常严格的健康检查，我们的应召女郎不会和来自其他机构、其他成人娱乐场所的女性进行互动。</p>
			<div>&nbsp;</div>
			<p>所显示的费率是针对应召女郎的陪护。 可能发生的所有、以及任何其他活动是在成年人相互同意的情形下进行的。</p>
			<div>&nbsp;</div>
			<p><?php echo $cf->get('siteName'); ?>希望在他们能够接收的任何方法下进行。 对您的要求就是要尊重他们。</p>

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