<div id="e_bottom" class="py-0">
  <div class="content_res">

    <div class="bottom">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-6 p-0">
            <?php
          		$db->connect();
          		$banner = $db->select(" select * from ".$prefix."banners where status = 'enable' and banner_side = 'left' order by _order asc ");
          		$db->close();
          		if(!$banner) {

          		} else {
          			$total_item = count($banner);
          			for($i = 0; $i < $total_item; $i++) {
          				$href = (empty($banner[$i]['link'])) ? 'javascript:;' : $fullUrl.$sysLang.'/click-action.html?banner_id='.$banner[$i]['id'].'&url='.$banner[$i]['link'].'';
          				$target = ($banner[$i]['_blank'] == 'yes') ? '_blank' : '_parent';

          				if($banner[$i]['banner_type'] == 'image') {
          					?>
          						<div class="banner">
          							<a href="<?php echo $href; ?>" title="<?php echo $banner[$i]['name']; ?>" target="<?php echo $target; ?>"><img src="<?php echo $fullUrl.'image-banner/'.$banner[$i]['file_name']; ?>" width="100%" alt="<?php echo $banner[$i]['name']; ?>" /></a>
          						</div>
          					<?php
          				} else if($banner[$i]['banner_type'] == 'link') {
          					?>
          						<div class="link">
          							<div class="item">
          								<a href="<?php echo $href; ?>" title="<?php echo $banner[$i]['name']; ?>" target="<?php echo $target; ?>"><?php echo $banner[$i]['name']; ?></a>
          							</div>
          						</div>
          					<?php
          				}
          			}
          		}

          		unset($banner, $href, $target, $total_item);
          	?>
          </div>
          <div class="col-xs-12 col-md-6 p-0">
            <?php
          		$db->connect();
          		$banner = $db->select(" select * from ".$prefix."banners where status = 'enable' and banner_side = 'right' order by _order asc ");
          		$db->close();
          		if(!$banner) {

          		} else {
          			$total_item = count($banner);
          			for($i = 0; $i < $total_item; $i++) {
          				$href = (empty($banner[$i]['link'])) ? 'javascript:;' : $fullUrl.$sysLang.'/click-action.html?banner_id='.$banner[$i]['id'].'&url='.$banner[$i]['link'].'';
          				$target = ($banner[$i]['_blank'] == 'yes') ? '_blank' : '_parent';

          				if($banner[$i]['banner_type'] == 'image') {
          					?>
          						<div class="banner">
          							<a href="<?php echo $href; ?>" title="<?php echo $banner[$i]['name']; ?>" target="<?php echo $target; ?>"><img src="<?php echo $fullUrl.'image-banner/'.$banner[$i]['file_name']; ?>" width="100%" alt="<?php echo $banner[$i]['name']; ?>" /></a>
          						</div>
          					<?php
          				} else if($banner[$i]['banner_type'] == 'link') {
          					?>
          						<div class="link">
          							<div class="item">
          								<a href="<?php echo $href; ?>" title="<?php echo $banner[$i]['name']; ?>" target="<?php echo $target; ?>"><?php echo $banner[$i]['name']; ?></a>
          							</div>
          						</div>
          					<?php
          				}
          			}
          		}

          		unset($banner, $href, $target, $total_item);
          	?>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="first-footer">
  <div class="content_res expand-width">
    <div class="container">
      <div class="row flex-xs-column flex-md-row justify-content-md-between">
        <div class="col text-uppercase text-sm">
          <p class="mb-0">
            &copy; COPYRIGHT 2014 - 2018 <?php echo $httpHost; ?>. ALL RIGHTS RESERVED.
          </p>
          <p class="mb-0 text-primary">
            <i class="fas fa-mobile-alt"></i> <?php echo $sitePhone; ?>
            <i class="ml-3 far fa-envelope"></i> <?php echo $siteEmail; ?>
          </p>
        </div>
        <div class="col-auto text-lg">
          <a href="#" class="mx-1"><i class="icon fab fa-facebook"></i></a>
          <a href="#" class="mx-1"><i class="icon fab fa-google"></i></a>
          <a href="#" class="mx-1"><i class="icon fab fa-twitter"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="second-footer">
  <div class="content_res expand-width">
    <div class="container">
      <div class="row d-xs-block d-md-none justify-content-center mb-2">
        <button class="btn btn-xs btn-outline-primary text-uppercase btn-block" type="button" data-toggle="collapse" data-target="#languageIcons" aria-controls="languageIcons" aria-expanded="false" aria-label="Choose Language">Choose Language</button>
      </div>
      <div id="languageIcons" class="collapse">
        <div class="row no-gutters mb-3">
          <?php $query_string = $_SERVER['QUERY_STRING']; ?>
          <?php foreach($languageSet as $key => $value) { ?>
            <div class="col-auto mr-2">
              <a href="<?php echo $fullUrl.$value.'/'.implode('/', $fakeUri); ?>" title="<?php echo $languageLabel[$value]; ?>">
                <img src="<?php echo $fullUrl.'image/icon-'.$value.'.png'; ?>" width="auto" height="16" alt="icon-<?php echo $value.'.png'; ?>" />
              </a>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="e_footer" class="py-0">
	<div class="content_res">

    <div class="footer py-5">
      <div class="container">
        <div class="row">
          <div class="col-md text-center text-md-left">
            <div class="copyright">&copy; Copyright <?php echo $copyright; ?> <?php echo $_SERVER['HTTP_HOST']; ?>. All Rights Reserved.</div>
            <div class="footer-links gold my-0 mt-4 mt-md-1">
              <i class="fas fa-mobile-alt"></i> <?php echo $sitePhone; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-envelope"></i> <?php echo $siteEmail; ?>
            </div>
          </div>
          <div class="col-md-auto text-center text-md-left">
            <div class="social mt-3 mt-md-0">
              <!-- <span class="d-none d-md-inline-block mr-1">Follow Us On: </span> -->
              <a href="#" class="mx-1"><i class="icon fab fa-facebook"></i></a>
              <a href="#" class="mx-1"><i class="icon fab fa-google"></i></a>
              <a href="#" class="mx-1"><i class="icon fab fa-twitter"></i></a>
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col text-center text-md-left">
            <div class="footer-links gold my-0 mt-4 mt-md-1">
              <i class="fas fa-mobile-alt"></i> <?php echo $sitePhone; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-envelope"></i> <?php echo $siteEmail; ?>
            </div>
          </div>
        </div> -->
      </div>

      <div class="container">
        <div class="row">
          <div class="col text-center text-md-left">
            <div class="language my-0 mt-4 mt-md-2">
              <div class="icon my-0">
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

        <div class="d-none row">
          <div class="col">
            <div id="google_translate_element"></div>
            <script>
              function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ar,de,en,es,fr,it,ja,ko,ru,zh-TW', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL, autoDisplay: false, multilanguagePage: true}, 'google_translate_element');
              }
            </script>
            <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
          </div>
        </div>
      </div>
    </div>

	</div>
</div>
