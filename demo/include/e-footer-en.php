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

<div class="footer pt-4 pb-5">

  <div class="first-footer">
    <div class="content_res expand-width">
      <div class="container">
        <div class="row justify-content-xs-center justify-content-md-between">
          <div class="col-12 col-md text-uppercase mb-1 mb-md-0">
            <div class="row no-gutters justify-content-xs-center justify-content-sm-start text-center text-md-left text-sm">
              <div class="col-sm-auto mr-sm-2">&copy; COPYRIGHT 2014 - 2018 <?php echo $httpHost; ?>.</div>
              <div class="col-sm-auto">ALL RIGHTS RESERVED.</div>
            </div>
            <div class="row no-gutters justify-content-xs-center justify-content-sm-start text-center text-md-left text-primary text-md">
              <div class="col-sm-auto mr-sm-3"><i class="fas fa-mobile-alt"></i> <?php echo $sitePhone; ?></div>
              <div class="col-sm-auto"><i class="far fa-envelope"></i> <?php echo $siteEmail; ?></div>
            </div>
          </div>
          <div class="col-12 col-md-auto text-xl mb-3 mb-md-0 text-center text-md-left">
            <a href="#" class="mx-1"><i class="icon fab fa-facebook"></i></a>
            <a href="#" class="mx-1"><i class="icon fab fa-google"></i></a>
            <a href="#" class="mx-1"><i class="icon fab fa-twitter"></i></a>
          </div>
        </div>
      </div><!-- /.container -->
    </div><!-- /.content_res -->
  </div><!-- /.first-footer -->

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
      </div><!-- /.container -->
    </div><!-- /.content_res -->
  </div><!-- /.second-footer -->

</div><!-- /.footer -->
