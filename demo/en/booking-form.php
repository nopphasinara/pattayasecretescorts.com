<?php
	$rxss = $_SESSION['xss'];
	$xss = $mw->query($_GET, 'xss');

	$script['jquery_ui'] = 'yes';
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
			<h1 class="title text_yellow give_space10"><strong>BOOKING DETAILS</strong></h1>

      <br>

      <form id="form_add" class="booking-form" action="<?php echo $fullUrl.$sysLang.'/booking-action.html'; ?>" method="post">
        <input type="hidden" name="mode" value="add" />
        <input type="hidden" name="form_id" value="form_add" />
        <?php if ($_SESSION['form_response'] && $_SESSION['form_response'] != '') { ?>
          <div class="p-3 mb-4 bg-warning text-dark border border-dark alert alert-dismissible" style="border-width: 4px;">
            <p class="text-danger my-0"><?php echo $_SESSION['form_response']; ?></p>
            <button type="button" class="close" aria-label="Close" data-dismiss="alert">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php } ?>
        <?php
          $option_profile = '';
          $db->connect();
          $profile = $db->select(" select * from ".$prefix."profiles where status = 'enable' order by nickname asc ");
          $db->close();
          if($profile) {
            $total_item = count($profile);
            for($i = 0; $i < $total_item; $i++) {
              $option_profile .= '<option value="'.$profile[$i]['id'].'">'.$profile[$i]['nickname'].'</option>';
            }
          }

          foreach(array(
            '1st_choice' => 'YOUR FIRST CHOICE (NAME OF ESCORT REQUIRED)',
            '1st_alternative' => 'YOUR ALTERNATIVE 2<sup>ND</sup> CHOICE (NAME OF ESCORT)',
          ) as $key => $value) {
            $last = ($key == '1st_alternative') ? 'last' : '';
            $selected_value = (empty($xss[$key])) ? (empty($rxss[$key])) ? '' : $rxss[$key] : $xss[$key];
            ?>
            <div class="form-group e_escort" data-id="<?php echo $key; ?>">
              <label><?php echo $value; ?></label>
              <select id="<?php echo $key; ?>" name="<?php echo $key; ?>" class="select_escort form-control rounded-0">
                <option value=""></option>
                <?php echo $option_profile; ?>
              </select>
            </div>
            <?php
            echo '<div class="d-none e_escort item inline '.$last.'" data-id="'.$key.'">
              <div class="title text_yellow">
                <strong>'.$value.'</strong>
              </div>
              <div class="loading hidden"></div>
              <div class="thumbnail">
                <img src="'.$fullUrl.'image-profile/empty.jpg" width="152" alt="'.$value.'" />
              </div>
            </div>';
          }
          unset($option_profile);
        ?>
        <div class="form-group">
          <label>YOUR FULL NAME AS ON HOTEL BOOKING</label>
          <input type="text" id="full_name" name="full_name" class="form-control" value="<?php echo $rxss['full_name']; ?>">
        </div>
        <div class="form-group">
          <label>YOUR EMAIL ADDRESS</label>
          <input type="email" id="email" name="email" class="form-control" value="<?php echo $rxss['email']; ?>">
        </div>
        <div class="form-group">
          <label>DATE THAT THE BOOKING IS REQUIRED</label>
          <input type="date" id="date" name="date" class="form-control datepicker" value="<?php echo $rxss['date']; ?>">
        </div>
        <div class="form-group">
          <label>DESIRED TIME FOR THE BOOKING TO START</label>
          <input type="time" id="time" name="time" class="form-control datepicker" value="<?php echo $rxss['time']; ?>">
        </div>
        <div class="form-group">
          <label>LENGTH OF BOOKING (TIME REQUIRED FOR BOOKING)</label>
          <select id="duration" name="duration" class="form-control">
            <?php
              foreach($array_duration as $key => $value) {
                $selected = ($rxss['duration'] == $key) ? 'selected' : '';
                echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
              }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>NAME OF YOUR HOTEL, ADDRESS AND TELPHONE NUMBER</label>
          <input type="text" id="hotel" name="hotel" class="form-control" value="<?php echo $rxss['hotel']; ?>">
        </div>
        <div class="form-group">
          <label>YOUR ROOM NUMBER</label>
          <input type="text" id="room_number" name="room_number" class="form-control" value="<?php echo $rxss['room_number']; ?>">
        </div>
        <div class="form-group">
          <p class="text-danger text-center">All the above are required for us to proceed with your booking.</p>
        </div>
        <button class="g-recaptcha button-submit btn btn-lg btn-primary btn-block text-uppercase" data-badge="no" data-sitekey="6LcFykUUAAAAANWNFvyYRlSvAV3vBkAwtKfdxivt" data-callback="bookingSubmit">SUBMIT BOOKING REQUEST</button>
      </form>
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
