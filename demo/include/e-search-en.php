<div class="box-search">
  <div class="container">
    <form action="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" method="get" id="form_search">
      <input type="hidden" name="mode" value="search" />
      <input type="hidden" name="form_id" value="form_search" />
      <?php if ($_SESSION['form_response'] && $_SESSION['form_response'] != '') { ?>
        <div class="p-3 mb-4 bg-warning text-dark border border-dark alert alert-dismissible" style="border-width: 4px;">
          <p class="text-danger my-0"><?php echo $_SESSION['form_response']; ?></p>
          <button type="button" class="close" aria-label="Close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php } ?>
      <div class="form-row align-items-center">
        <div class="col-auto">
          <label class="text-uppercase"><strong>Keywords</strong></label>
        </div>
        <div class="col">
          <input type="text" name="keyword" value="<?php echo $xss['keyword']; ?>" class="form-control" />
        </div>
        <div class="col-auto">
          <button class="btn btn-warning text-uppercase" type="submit" name="button" role="button"><strong>Search</strong></button>
        </div>
        <div class="col-auto">
          <button class="btn btn-outline-warning text-uppercase show_anvance" type="button" name="button" role="button"><strong>Show Advance Option</strong></button>
        </div>
      </div>
      <div id="advance_option" class="<?php echo $option_hidden; ?> mt-4">
        <div class="form-row mb-4">
          <div class="col-auto">
            <label class="d-none d-sm-block text-uppercase"><strong style="color: #000 !important;">Keywords</strong></label>
          </div>
          <div class="col">
            <h6 class="mb-2"><strong>Receives:</strong></h6>
            <?php
            $db->connect();
            $receives = $db->select(" select * from ".$prefix."services where status = 'enable' and receives = 'yes' order by name_".$sysLang." asc ");
            $db->close();
            if($receives) {
              ?>
              <div class="row">
                <?php
                $total_item = count($receives);
                for($i = 0; $i < $total_item; $i++) {
                  $checked = (in_array($receives[$i]['id'], $xss['receives'])) ? 'checked' : '';
                  ?>
                  <div class="col-12 col-md-4">
                    <input type="checkbox" name="receives[]" value="<?php echo $receives[$i]['id']; ?>" <?php echo $checked; ?> /> <?php echo $receives[$i]['name_'. $sysLang .'']; ?>
                  </div>
                  <?php
                }
                ?>
              </div>
              <?php
            }
            ?>
          </div>
        </div>
        <div class="form-row">
          <div class="col-auto">
            <label class="d-none d-sm-block text-uppercase"><strong style="color: #000 !important;">Keywords</strong></label>
          </div>
          <div class="col">
            <h6 class="mb-2"><strong>Offers:</strong></h6>
            <?php
            $db->connect();
            $offers = $db->select(" select * from ".$prefix."services where status = 'enable' and offers = 'yes' order by name_".$sysLang." asc ");
            $db->close();
            if($offers) {
              ?>
              <div class="row">
                <?php
                $total_item = count($offers);
                for($i = 0; $i < $total_item; $i++) {
                  $checked = (in_array($offers[$i]['id'], $xss['offers'])) ? 'checked' : '';
                  ?>
                  <div class="col-12 col-md-4">
                    <input type="checkbox" name="offers[]" value="<?php echo $offers[$i]['id']; ?>" <?php echo $checked; ?> /> <?php echo $offers[$i]['name_'. $sysLang .'']; ?>
                  </div>
                  <?php
                }
                ?>
              </div>
              <?php
            }
            ?>
          </div>
        </div>

        <div class="line-break my-4"></div>
      </div>
    </form>
  </div>
</div>
