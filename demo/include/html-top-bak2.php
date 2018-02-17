<!DOCTYPE html>
<html lang="<?php echo $sysLang; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width" />
  <meta name="description" content="<?php echo $tagDescription; ?>" />
  <meta name="keywords" content="<?php echo $tagKeywords; ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo $tagTitle; ?></title>
  <!--<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; user-scalable=no;" />-->
  <meta name="MobileOptimized" content="width" />
  <meta name="HandheldFriendly" content="true" />
  <meta name="robots" content="<?php echo $robots; ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="<?php echo $cf->get('siteName'); ?>" />
  <meta property="og:title" content="<?php echo $tagTitle; ?>" />
  <meta property="og:description" content="<?php echo $tagDescription; ?>" />
  <meta property="og:url" content="<?php echo $tagUrl; ?>" />
  <meta property="og:image" content="<?php echo $tagImage; ?>" />
  <meta property="og:updated_time" content="<?php echo date('Y-m-d H:i:s', $requestTime); ?>" />
  <!-- <link href='https://fonts.googleapis.com/css?family=Oswald:700,400' rel='stylesheet' type='text/css'> -->
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo $fullUrl; ?>css/main.css" />
  <!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php echo $fullUrl; ?>css/ie7.css" /><![endif]-->
  <!-- <script src="<?php echo $fullUrl; ?>script/intlib-min.js"></script> -->

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CStalemate" rel="stylesheet" type="text/css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous"> -->
  <link href="<?php echo $siteUrl; ?>assets/css/style-old.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style>
  .box-profile .box-photo .thumbnail a {
      display: block !important;
      height: 276px;
      overflow: hidden !important;
      text-align: center !important;
  }
  .box-profile .box-photo .thumbnail img {
      width: 100% !important;
      height: auto !important;
  }

  .line-break {
    width: 100% !important;
    height: 2px !important;
    overflow: hidden !important;
    background: #977d49 !important;
  }

  #e_header {
    position: relative !important;
    background: none !important;
    border-bottom: solid 1px #232323 !important;
  }

  #e_header > .content_res {
    position: absolute;
    left: 0;
    top: 0;
    width: 100% !important;
    height: 100% !important;
    z-index: -1 !important;
  }

  #e_header > .content_res .box-bg {
    width: 100% !important;
    height: 100% !important;
    max-width: 960px !important;
    margin: 0 auto !important;
    background: url(<?php echo $fullUrl . 'image/top-bg.jpg'; ?>) no-repeat right bottom !important;
  }

  .device-mobile #e_header,
  .device-tablet #e_header {
    padding-bottom: 40px !important;
  }

  .device-mobile #e_header > .content_res .box-bg {
    /* background-position: right 30px !important; */
  }

  .goog-te-gadget-simple {
    color: #fff !important;
    background: transparent !important;
    border-color: transparent !important;
  }
  .goog-te-gadget-simple * {
    color: #fff !important;
  }
  .goog-te-gadget-simple .goog-te-gadget-icon {
    display: none !important;
  }
  .goog-te-gadget-simple .goog-te-menu-value * {
    border: none !important;
  }
  .goog-te-menu-frame {
    color: #fff !important;
    background: #977d49 !important;
  }
  .goog-te-menu-frame * {
    color: #fff !important;
  }
  </style>
</head>
<body class="<?php echo $body_class; ?>">
  <div id="viewport">
    <div class="xs d-none d-xs-inline-block d-sm-none">xs</div>
    <div class="sm d-none d-sm-inline-block d-md-none">sm</div>
    <div class="md d-none d-md-inline-block d-lg-none">md</div>
    <div class="lg d-none d-lg-inline-block">lg</div>
  </div>
