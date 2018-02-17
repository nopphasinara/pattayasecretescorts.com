<?php
$menu[str_replace('-', '_', $pageName)] = 'active';
if ($pageName == 'booking-form') {
  $menu['booking'] = 'active';
}
?>
<div id="e_nav">
  <div class="content_res">
    <div class="navbar navbar-expand-md navbar-dark bg-primary py-0" role="navigation">
      <div class="d-xs-block d-md-none w-100 d-flex align-items-center">
        <a class="btn btn-primary btn-block text-left py-2" role="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation" href="#"><span class="navbar-toggler-icon"></span> TOGGLE NAVIGATION</a>
      </div>

      <div class="collapse navbar-collapse" id="navbarsExample04">
        <div class="navbar-nav w-100">
          <div class="col-md m-0 p-0">
            <div class="nav-item py-1 <?php echo $menu['home']; ?>">
              <a href="<?php echo $fullUrl.$sysLang.'/home.html'; ?>" title="Home" class="nav-link px-3 py-2">Home</a>
            </div>
          </div>
          <div class="col-md m-0 p-0">
            <div class="nav-item py-1 <?php echo $menu['profiles']; ?>">
              <a href="<?php echo $fullUrl.$sysLang.'/profiles.html'; ?>" title="Profiles" class="nav-link px-3 py-2">GALLERY</a>
            </div>
          </div>
          <div class="col-md m-0 p-0">
            <div class="nav-item py-1 <?php echo $menu['services']; ?>">
              <a href="<?php echo $fullUrl.$sysLang.'/services.html'; ?>" title="Services" class="nav-link px-3 py-2">SERVICES</a>
            </div>
          </div>
          <div class="col-md m-0 p-0">
            <div class="nav-item py-1 <?php echo $menu['rates']; ?>">
              <a href="<?php echo $fullUrl.$sysLang.'/rates.html'; ?>" title="Rates" class="nav-link px-3 py-2">RATES</a>
            </div>
          </div>
          <div class="col-md m-0 p-0">
            <div class="nav-item py-1 <?php echo $menu['booking']; ?>">
              <a href="<?php echo $fullUrl.$sysLang.'/booking.html'; ?>" title="Booking" class="nav-link px-3 py-2">BOOKING</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
