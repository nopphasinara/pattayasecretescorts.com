<?php
    $rxss = $_SESSION['xss'];
    if ($_SESSION['response'] == 'text-success') {
        $rxss = array();
    }

	$query = array(
		'pageName' => $absUri['1'],
		'id' => $absUri['2'],
		'modName' => $absUri['3']
	);
	$xss = $mw->query($query, 'xss');

	if(empty($xss['id'])) {
		$mw->notfound();
	}

	$db->connect();
	$data = $db->select(" select * from ".$prefix."profiles where status = 'enable' and id = '".$xss['id']."' ");
	$db->close();
	if(!$data || $data['0']['id'] != $xss['id']) {
		$mw->notfound();
	}

	$data = $data['0'];

	$db->connect();
	$db->command(" update ".$prefix."profiles set _view = _view + 1 where id = '".$data['id']."' ");
	$db->close();

	$data['detail_'.$sysLang.''] = (empty($data['detail_'.$sysLang.''])) ? $data['detail_'.$defaultLang.''] : $data['detail_'.$sysLang.''];

	$tagTitle = $data['nickname'].' - '.$cf->get('siteName');
	$tagDescription = strip_tags($data['detail_'.$sysLang.'']);

	$script['fancybox'] = 'yes';
	$script['recaptcha'] = 'yes';

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

      <div class="box-profile">
        <div class="container">
          <div class="row">

            <div class="col-12">
              <h1 class="text-primary text-uppercase mb-3"><strong><?php echo $data['nickname']; ?></strong></h1>

              <div class="row">
                <div class="col-12 mb-4">
                  <?php echo stripcslashes($data['detail_'.$sysLang.'']); ?>

                  <ul class="list-unstyled">
                    <li>
                      Height: <?php if(empty($data['height'])) { echo '-'; } else { echo $data['height']; } ?> cm
                    </li>
                    <li>
                      Weight: <?php if(empty($data['weight'])) { echo '-'; } else { echo $data['weight']; } ?> kg
                    </li>
                    <li>
                      Shoe size: <?php if(empty($data['shoe_size'])) { echo '-'; } else { echo $data['shoe_size']; } ?> eu
                    </li>
                  </ul>
                </div>
              </div>

              <div class="box-photos mb-4">
                  <div class="row">
                      <?php
                          $db->connect();
                          $photo = $db->select(" select * from ".$prefix."photos where profile_id = '".$data['id']."' order by _order asc ");
                          $photos = $db->select(" select * from ".$prefix."photos where profile_id = '".$data['id']."' order by _order asc ");
                          $db->close();
                          if ($photos) {
                            $perrow = 4;
                            $total_item = count($photos);
                            $ceil_row = ceil($total_item / $perrow);
                            $row = 0;
                            $n = 1;
                            foreach ($photos as $index => $photo) {
                              $row = ($n == 1) ? ($row + 1) : $row;
                              $last_row = ($row == $ceil_row) ? 'last_row' : '';

                              $profile_image = $fullUrl.'image-profile/thumbnail/'.$photo['file_name'];
                              ?>
                              <div class="col-12 col-sm-6 col-md-3 <?php if ($last_row) { echo 'mb-5'; } else { echo 'mb-4'; } ?> box-photo">
                                <div class="thumbnail">
                                  <a href="<?php echo $profile_image; ?>" title="" class="fancybox" rel="group">
                                    <img src="<?php echo $profile_image; ?>" width="100%" alt="<?php echo $photo['file_name']; ?>" />
                                  </a>
                                </div>
                              </div>
                              <?php
                              $n = $n + 1;
                              $n = ($n > $perrow) ? 1 : $n;
                            }
                          }
                      ?>
                  </div>
              </div>

              <div class="row mb-4">
                <div class="col-12">
                  <h3 class="text-primary text-uppercase mb-3"><strong>Advance Options</strong></h3>
                  <?php
                  $db->connect();
                  $receives = $db->select("SELECT * FROM sw_services WHERE status = 'enable' AND receives = 'yes' ORDER BY name_".$sysLang." ASC");
                  $db->close();
                  if($receives) {
                    ?>
                    <div class="row mb-4">
                      <div class="col-12">
                        <p class="mb-1"><strong>Receives:</strong></p>
                        <div class="row">
                          <?php
                          $total_item = count($receives);
                          $ceil_row = ceil($total_item / 2);
                          $row = 0;
                          $n = 1;
                          for($i = 0; $i < $total_item; $i++) {
                            $receives[$i]['name_'.$sysLang.''] = empty($receives[$i]['name_'.$sysLang.'']) ? $receives[$i]['name_'.$defaultLang.''] : $receives[$i]['name_'.$sysLang.''];
                            $checked_service = $mw->checkService($data['id'], $receives[$i]['id']) == 'checked' ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-check-circle text-danger"></i>';
                            ?>
                            <div class="col-12 col-sm-6 col-md-4">
                              <?php echo $checked_service .' '. $receives[$i]['name_'.$sysLang.'']; ?>
                            </div>
                            <?php
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                  ?>

                  <?php
                  $db->connect();
                  $receives = $db->select("SELECT * FROM sw_services WHERE status = 'enable' AND offers = 'yes' ORDER BY name_".$sysLang." ASC");
                  $db->close();
                  if($receives) {
                    ?>
                    <div class="row">
                      <div class="col-12">
                        <p class="mb-1"><strong>Offers:</strong></p>
                        <div class="row">
                          <?php
                          $total_item = count($receives);
                          $ceil_row = ceil($total_item / 2);
                          $row = 0;
                          $n = 1;
                          for($i = 0; $i < $total_item; $i++) {
                            $receives[$i]['name_'.$sysLang.''] = empty($receives[$i]['name_'.$sysLang.'']) ? $receives[$i]['name_'.$defaultLang.''] : $receives[$i]['name_'.$sysLang.''];
                            $checked_service = $mw->checkService($data['id'], $receives[$i]['id']) == 'checked' ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-check-circle text-danger"></i>';
                            ?>
                            <div class="col-12 col-sm-6 col-md-4">
                              <?php echo $checked_service .' '. $receives[$i]['name_'.$sysLang.'']; ?>
                            </div>
                            <?php
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                  ?>
                </div>
              </div>
            </div>

            <!-- <div class="col-md-4">
              <div class="card mb-4">
                <?php echo image_holder('100px300'); ?>
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div> -->

          </div>

        </div><!-- /.container -->
      </div><!-- /.box-profile -->


      <div class="line-break my-4"></div>


			<!--e_video-->
			<div id="e_video" class="d-none">
				<?php
					if(strtolower($data['show_video']) == 'yes') {
						if(!empty($data['video'])) {
							?>
								<div class="form_item">
									<div class="size1 inline give_break10">
										&nbsp;
									</div><!--
									--><div class="size5 inline">
										<link type="text/css" rel="stylesheet" href="<?php echo $fullUrl; ?>videocontrol/jquery.videocontrols.css">
										<script type="text/javascript" src="<?php echo $fullUrl; ?>videocontrol/jquery.videocontrols.js"></script>
										<video id="myVideo_demo" width="640" height="480" controls="controls" bgcolor="#000000" poster="<?php echo $fullUrl.'image/video.jpg'; ?>">
											<source src="<?php echo $fullUrl.'video/'.$data['video']; ?>">
										</video>
										<script type="text/javascript">
											$(document).ready(function () {
												$('#myVideo_demo').videocontrols({
													//markers: [40, 84, 158, 194, 236, 272, 317, 344, 397, 447, 490, 580],
													preview: {
														step: 50,
														width: 640,
														height: 480
													},
													theme: {
														progressbar: 'red',
														range: 'yellow',
														volume: 'yellow'
													}
												});
											});
										</script>
									</div>
								</div>
							<?php
						} else if(!empty($data['embed'])) {
							?>
								<div class="form_item">
									<div class="size1 inline give_break10">
										&nbsp;
									</div><!--
									--><div class="size5 inline">
										<?php echo htmlspecialchars_decode($data['embed']); ?>
									</div>
								</div>
							<?php
						}
					}
				?>
			</div>
			<!--/e_video-->

			<div>&nbsp;</div><div>&nbsp;</div>

      <div class="box-reviews">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-8 mb-4 mb-md-0">
              <?php
              $db->connect();
              $reviews = $db->select(" select * from ".$prefix."reviews where status = 'enable' and profile_id = '".$data['id']."' order by date_time desc ");
              $db->close();
              if(!$reviews) {
                ?>
                <h3 class="text-primary text-uppercase mb-3"><strong>Reviews (0)</strong></h3>
                <p class="text-center">
                  <strong>Be the first one to write a review for <?php echo $data['nickname']; ?>.</strong>
                </p>
                <?php
              } else {
                $total_item = count($reviews);
                ?><h3 class="text-primary text-uppercase mb-3"><strong>Reviews <?php echo number_format($total_item, 0, '', '.'); ?></strong></h3><?php
                for($i = 0; $i < $total_item; $i++) {
                  $star = '';
                  for($k = 0; $k < $reviews[$i]['rate']; $k++) {
                    $star .= '<i class="icon fas fa-star text-primary"></i>';
                  }

                  for($k = 1; $k <= (10 - $reviews[$i]['rate']); $k++) {
                    $star .= '<i class="icon far fa-star text-primary"></i>';
                  }

                  ?>
                  <div class="box-review <?php if($total_item != ($i + 1)) { echo 'mb-5'; } ?>">
                    <blockquote class="blockquote">
                      <div class="text-md mb-2"><?php echo stripcslashes($reviews[$i]['text']); ?></div>
                      <footer class="blockquote-footer text-md"><?php echo $star; ?> <cite title="<?php echo $reviews[$i]['name']; ?> Says"><?php echo $reviews[$i]['name']; ?> Says</cite></footer>
                    </blockquote>
                  </div>
                  <?php
                }
              }
              ?>
            </div>
            <div class="col-12 col-md-4">
              <h3 class="text-primary text-uppercase mb-3"><strong>Leave your review</strong></h3>
              <form class="" action="<?php echo $fullUrl.$sysLang.'/review-action.html'; ?>" method="post" id="form_review">
                <input type="hidden" name="mode" value="add" />
                <input type="hidden" name="profile_id" value="<?php echo $data['id']; ?>" />
                <input type="hidden" name="form_id" value="form_review" />
                <?php if ($_SESSION['form_response'] && $_SESSION['form_response'] != '') { ?>
                  <div class="p-3 mb-4 bg-warning text-dark border border-dark alert alert-dismissible" style="border-width: 4px;">
                    <p class="text-danger my-0"><?php echo $_SESSION['form_response']; ?></p>
                    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php } ?>
                <div class="form-group">
                  <label>Your Name <strong>*</strong></label>
                  <input type="text" name="name" value="<?php echo $rxss['name']; ?>" class="form-control" />
                </div>
                <div class="form-group">
                  <label>Email Address <strong>*</strong></label>
                  <input type="email" name="email" value="<?php echo $rxss['email']; ?>" class="form-control" />
                </div>
                <div class="form-group">
                  <label>Comments <strong>*</strong></label>
                  <textarea name="text" rows="8" class="form-control"><?php echo $rxss['text']; ?></textarea>
                </div>
                <div class="form-group">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <label>Rate <strong>*</strong></label>
                    </div>
                    <div class="col">
                      <select class="form-control" name="rate">
                        <?php
                        for($i = 1; $i <= 10; $i++) {
                          $selected = $rxss['rate'] == $i ? 'selected' : '';
                          echo '<option value="'.$i.'" '. $selected .'>'.$i.'</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <button class="g-recaptcha button-submit btn btn-lg btn-primary btn-block text-uppercase" data-badge="no" data-sitekey="6LcFykUUAAAAANWNFvyYRlSvAV3vBkAwtKfdxivt" data-callback="reviewSubmit">SUBMIT</button>
              </form>
            </div>
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
