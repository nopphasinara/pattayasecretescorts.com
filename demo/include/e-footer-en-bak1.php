<div id="e_footer">
	<div class="content_res">
    <div class="box_left">
      <div class="">&copy; Copyright <?php echo $copyright; ?> <?php echo $_SERVER['HTTP_HOST']; ?>. All Rights Reserved.</div>
      <div class="gold">
        <a href="#">Contact Us</a> | <a href="#">Terms &amp; Conditions</a> | <?php echo $sitePhone; ?>, <?php echo $siteEmail; ?>
      </div>
    </div>
    <div class="box_right">
      <div class="social text-center">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-google"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
      </div>
    </div>
    <div class="clear"></div>

    <div class="language">
      <div class="icon">
        <?php
          $query_string = ($_SERVER['QUERY_STRING'] == '') ? '' : '?'.$_SERVER['QUERY_STRING'];
          foreach($languageSet as $key => $value) {
            echo '<div class="item inline '.$value.'">
              <a href="'.$fullUrl.$value.'/'.implode('/', $fakeUri).'" title="'.$languageLabel[$value].'"><img src="'.$fullUrl.'image/icon-'.$value.'.png" width="40" height="24" alt="icon-'.$value.'.png" /></a>
            </div>';
          }
        ?>
      </div>
    </div>
	</div>
</div>

<?php /*<div id="e_bottom">
	<div class="container">
    <div class="row">
      <div class="col">
        xxxx
      </div>
      <div class="col-auto">
        zzzz
      </div>
    </div>
  </div>
</div>

<div class="footer py-4">
  <div class="container">
    <div class="row">
      <div class="col-md text-center text-md-left">
        <div class="copyright">&copy; Copyright <?php echo $copyright; ?> <?php echo $_SERVER['HTTP_HOST']; ?>. All Rights Reserved.</div>
      </div>
      <div class="col-md-auto text-center text-md-left">
        <div class="social mt-3 mt-md-0">
          <span class="d-none d-md-inline-block mr-1">Follow Us On: </span> <a href="#" class="mx-1"><i class="fab fa-facebook"></i></a>
          <a href="#" class="mx-1"><i class="fab fa-google"></i></a>
          <a href="#" class="mx-1"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col text-center text-md-left">
        <div class="footer-links gold mt-3 mt-md-0">
          <a href="#">Contact Us</a> | <a href="#">Terms &amp; Conditions</a> | <?php echo $sitePhone; ?>, <?php echo $siteEmail; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col text-center text-md-left">
        <div class="language mt-3 mt-md-0">
          <div class="icon">
            <?php
              $query_string = ($_SERVER['QUERY_STRING'] == '') ? '' : '?'.$_SERVER['QUERY_STRING'];
              foreach($languageSet as $key => $value) {
                echo '<div class="item inline '.$value.' mx-1 mr-0 mx-md-0 mr-md-1">
                  <a href="'.$fullUrl.$value.'/'.implode('/', $fakeUri).'" title="'.$languageLabel[$value].'"><img src="'.$fullUrl.'image/icon-'.$value.'.png" width="40" height="24" alt="icon-'.$value.'.png" /></a>
                </div>';
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>*/ ?>
