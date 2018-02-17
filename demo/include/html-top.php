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

  <!-- Links to fonts use on template -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Oswald:700,400" rel="stylesheet"> -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CStalemate" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Main stylesheet and reset stylesheet for main.css -->
  <link href="<?php echo $fullUrl; ?>css/main.css" rel="stylesheet">
  <link href="<?php echo $siteUrl; ?>assets/css/style-old.css" rel="stylesheet">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<?php if ($pageName == '' || $pageName == 'home') {
  $body_class .= ' page-home';
} ?>
<body class="<?php echo $body_class; ?>">
  <div id="viewport">
    <div class="xs d-none d-xs-inline-block d-sm-none">xs</div>
    <div class="sm d-none d-sm-inline-block d-md-none">sm</div>
    <div class="md d-none d-md-inline-block d-lg-none">md</div>
    <div class="lg d-none d-lg-inline-block">lg</div>
  </div>

  <div class="content_res"><div class="box-bg">&nbsp;</div></div>
