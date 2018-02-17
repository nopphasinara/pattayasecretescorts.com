<div id="e_topbar2" class="">
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
          <div class="select-language py-3">
            <div class="row no-gutters flex-wrap">
              <?php $query_string = ($_SERVER['QUERY_STRING'] == '') ? '' : '?'.$_SERVER['QUERY_STRING']; ?>
              <?php foreach($languageSet as $key => $value) { ?>
                <div class="col">
                  <a href="<?php echo $fullUrl.$value.'/'.implode('/', $fakeUri); ?>" title="<?php echo $languageLabel[$value]; ?>">
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
