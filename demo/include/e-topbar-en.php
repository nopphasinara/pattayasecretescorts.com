<div id="e_topbar2" class="d-none d-md-block">
  <div class="content_res">
    <div class="container">
      <div class="row justify-content-xs-center justify-content-md-between align-items-center">
        <div class="col social-links d-none d-md-inline-block">
          <div class="row align-items-center no-gutters">
            <div class="col-auto">
              <div class="text_yellow mr-1">Follow Us On</div>
            </div>
            <div class="col">
              <a href="#" class="mx-1 my-auto text-md"><i class="icon fab fa-facebook"></i></a>
              <a href="#" class="mx-1 my-auto text-md"><i class="icon fab fa-google"></i></a>
              <a href="#" class="mx-1 my-auto text-md"><i class="icon fab fa-twitter"></i></a>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <div id="google_translate_element" class="py-2"></div>
          <div class="select-language py-2 d-none">
            <div class="row no-gutters flex-wrap">
              <?php $query_string = ($_SERVER['QUERY_STRING'] == '') ? '' : '?'.$_SERVER['QUERY_STRING']; ?>
              <?php foreach($languageSet as $key => $value) { ?>
                <div class="col-auto mx-1 mx-md-0 ml-md-1">
                  <a href="<?php echo $fullUrl.$value.'/'.implode('/', $fakeUri); ?>" title="<?php echo $languageLabel[$value]; ?>" rel="<?php echo $value; ?>">
                    <img src="<?php echo $fullUrl.'image/icon-'.$value.'.png'; ?>" width="auto" height="20" alt="icon-<?php echo $value.'.png'; ?>">
                  </a>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
