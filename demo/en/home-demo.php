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
			<h1 class="title text_yellow give_space15 text-center"><strong>WELCOME TO <?php echo $cf->get('siteName'); ?></strong></h1>

      <br>

			<p>It has become obvious that changes are taking place in Thailand and particularly within Pattaya. Therefore we at <?php echo $cf->get('siteName'); ?> have decided now is the perfect time to be in the vanguard of those changes. To that end we are delighted to offer a new and outstanding service here in Pattaya -  the emphasis being on discretion, quality of service and the health and welfare of both escorts and clients alike.</p>

      <br><br>

			<p class="text_yellow text_center text-titlecase display-5"><strong><?php echo $cf->get('siteName'); ?></strong></p>
			<p class="text_yellow text_center text-titlecase display-4"><strong>"Discretion And Perfection, A Perfect Harmony"</strong></p>

      <br><br>

      <?php
      $db->report = true;
      $db->connect();
      $hot = $db->select("SELECT * FROM sw_profiles WHERE id != '' AND _hot = 'yes' AND status = 'enable' ORDER BY update_time DESC LIMIT 0, 6");
      $db->close();
      if ($hot) {
        ?>
        <div class="list-profiles">
          <div class="contaiiner">
            <div class="row">
              <?php foreach ($hot as $key => $profile) { ?>
                <?php
                $hot_label = ($profile['_hot'] == 'yes') ? '<div class="badge badge-hot"><img src="'.$fullUrl.'image/icon-hot.png" width="48" alt="HOT" /></div>' : '';
                $profile_link = $fullUrl . $sysLang . '/profile-details/' . $profile['id'].'/'.$mw->mod($profile['nickname']).'.html';
                ?>
                <div class="profile col-6 col-md-4 mb-4 text-center">
                  <div class="thumbnail">
                    <a href="<?php echo $profile_link; ?>" title="<?php echo $profile['nickname']; ?>">
                      <img class="img-fluid" src="<?php echo $fullUrl.'image-profile/thumbnail/'.$mw->getThumbnail($profile['id']); ?>" alt="<?php echo $profile['nickname']; ?>" style="width: auto !important; height: 380px !important;" />
                    </a>
                    <?php echo $hot_label; ?>
                  </div>
                  <h5 class="oswald mt-2 text-uppercase"><a href="<?php echo $profile_link; ?>" title="<?php echo $profile['nickname']; ?>"><?php echo $profile['nickname']; ?></a></h5>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>

        <a class="btn btn-lg btn-outline-primary btn-block" href="<?php echo $fullUrl.$sysLang . '/profiles.html'; ?>" title="Escorts Gallery">SEE ALL OUR LADIES</a>
        <?php
      }
      unset($hot);
      ?>
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
