<?php
  if (!isset($_SESSION['BookingData'])) {
    $_SESSION['BookingData'] = $_SESSION['xss'];
  } else {
    if (!empty($_SESSION['xss'])) {
      $_SESSION['BookingData'] = $_SESSION['xss'];
    }
  }

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
			<div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="text-primary text-uppercase mb-3"><strong>Booking Completed</strong></h1>
      			<p class="lead">Thank you for your booking request to the <?php echo $cf->get('siteName'); ?>. We aim to answer all emails as soon as possible, please allow 24 hours in which to receive a response.</p>

            <br>

      			<div class="row justify-content-center">
              <div class="col-12 col-sm-12 col-md-auto">
                <?php echo make_link('tel:'. $sitePhone .'', [
                  'text' => '<i class="fas fa-mobile-alt"></i> ' . $sitePhone,
                  'class' => 'btn btn-outline-primary btn-lg',
                ]); ?>
              </div>
              <div class="col-12 col-sm-12 col-md-auto">
                <?php echo email_link($bookingEmail, [
                  'text' => '<i class="far fa-envelope"></i> ' . $bookingEmail,
                  'class' => 'btn btn-outline-primary btn-lg',
                ]); ?>
              </div>
              <div class="col-12 col-sm-12 col-md-auto">
                <?php echo make_link($siteUrl, [
                  'text' => '<i class="fas fa-link"></i> ' . $_SERVER['HTTP_HOST'],
                  'class' => 'btn btn-outline-primary btn-lg',
                ]); ?>
              </div>
            </div>

            <br><br>

      			<p>
              Sincerely,<br />
        			<strong><?php echo $cf->get('siteName'); ?></strong>
            </p>
          </div>
        </div>
      </div>
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
