<?php if ($pageName && $pageName == 'home') { ?>
  <div class="main-carousel carousel slide" data-ride="carousel">
    <!-- <ol class="carousel-indicators">
      <li data-target=".main-carousel" data-slide-to="0" class="active"></li>
      <li data-target=".main-carousel" data-slide-to="1"></li>
    </ol> -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="first-slide" src="<?php echo $fullUrl . 'image/banner.jpg'; ?>" width="100%" alt="First slide">
        <div class="container">
          <!-- <div class="carousel-caption text-left">
            <h1>Example headline.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
          </div> -->
        </div>
      </div>
      <!-- <div class="carousel-item">
        <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
        <div class="container">
          <div class="carousel-caption text-right">
            <h1>One more for good measure.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
          </div>
        </div>
      </div> -->
    </div>
    <!-- <a class="carousel-control-prev" href=".main-carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href=".main-carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a> -->
  </div>
<?php } ?>
