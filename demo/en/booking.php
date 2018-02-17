<?php
	require($fullRoot.'include/html-top.php');
  require($fullRoot.'include/header.php');
?>

<!--e_wrapper-->
<div id="e_wrapper">
	<div class="content_res expand-width">
		<!--e_left-->
		<?php // require($fullRoot.'include/e-left-'.$sysLang.'.php'); ?>
		<!--/e_left-->

		<!--e_content-->
		<div id="e_content">
			<h1 class="title text_yellow give_space15 text-uppercase"><strong>THE HOTTEST PATTAYA ESCORTS ARE JUST WAITING FOR YOUR CALL, WHY DENY YOURSELF ANY LONGER PICK UP THE PHONE.</strong></h1>

      <br>

			<h2 class="subtitle text_yellow give_space15 text-uppercase">MAKING YOUR BOOKING</h2>

			<p>For advanced bookings and any special requests please fill in the <?php echo make_link($fullUrl.$sysLang . '/booking-form.html', ['text' => '<strong>form</strong>']); ?> or email us at: <strong><?php echo email_link($bookingEmail, ['class' => 'text-white']); ?></strong></p>

      <p>For same day or short notice bookings, please contact us by phone for immediate attention: <strong><?php echo $sitePhone; ?></strong></p>

			<br>

      <h2 class="subtitle text_yellow text-uppercase"><strong>PAYMENT SHOULD BE:</strong></h2>
      <p>To avoid any misunderstandings, we require the payment to be made in Thai Baht within the first few minutes of meeting the lady. Your time will start upon her arrival, so any delay in payment encroaches on the amount of time that you can both enjoy together. Please be aware that if the full amount is not offered within that initial time period, Escorts have been instructed to ask for the cancellation fee and leave.</p>

      <p>Cancellation for any reason after the escort's arrival will be charged at 1,000 Thai Baht to cover her transportation travel time costs. The cancellation fee also applies if you cancel a booking after the escort is en-route to you.</p>

      <p>Alternatively, you may pay the full amount by credit Card via our PayPal account.</p>

      <p class="font-italic">(PayPal is the fastest and most secure method of payment. <?php echo $cf->get('siteName'); ?> will never see your credit/debit card details as all such process's are carried out by PayPal. Hence protecting our clients from any form of Fraud)</p>

      <p>No booking will be confirmed until we have checked your hotel room number and spoken to you through the hotel's phone line.  You will be required to give us your full name, hotel and room number when making the booking.</p>

      <p>Ideally we would like 2 hours' notice of a booking if however making the booking by telephone this can often be reduced to 1 hour.</p>

      <p>When making the booking you agree to these terms.</p>

      <br>

      <h2 class="subtitle text_yellow text-uppercase"><strong>ADVANCE BOOKINGS</strong></h2>
      <p>A deposit of 50% is required for all advance bookings. Ideally this should be paid into our PayPal account for the security reasons given. Feel free to contact us for alternative ways to make the deposit. The balance will be expected when you meet with your escort.</p>

      <p>Extension over the original booking time will be charged as per published rates but only with the escort's agreement.</p>

      <p>Our escorts are not prepared to meet with more than one man, and the meeting cannot happen in a shared room with another guest in attendance. Under such circumstances, the payment for a 1-hour booking will be applied and the escort will leave immediately.</p>

      <p>The term "couples" refers to a man and his female partner. Due to our testing policy our escorts will not interact with women from other agencies or any other entertainment establishments.</p>

      <p>The rates shown are strictly for the escort's companionship. All and any other activities that may take place will be the individuals choice and by mutual consent.</p>

			<?php require($fullRoot.'include/button-booking.php'); ?>
		</div>
		<!--/e_content-->

		<!--e_right-->
		<?php // require($fullRoot.'include/e-right-'.$sysLang.'.php'); ?>
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
