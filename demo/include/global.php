<?php
error_reporting(0);
# Start session, cookie and get session_id
session_start();
session_regenerate_id();
define('SESSIONID', session_id());

$basePath = $cf->get('basePath');
$absUrl = $_SERVER['HTTP_HOST'];
$protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
$fullUrl = $protocol.$absUrl.$basePath;
$adminUrl = $fullUrl.'admin/';

$absRoot = $_SERVER['DOCUMENT_ROOT'];
$fullRoot = $absRoot.$basePath;

if($basePath == '/') {
	$absUri = explode('/', substr($_SERVER['REQUEST_URI'], 1));
} else {
	$absUri = explode('/', str_replace($basePath, '', $_SERVER['REQUEST_URI']));
}


$fakeUri = $absUri;
unset($fakeUri['0']);

$languageSet = array('en', 'ge', 'fr', 'ru', 'it', 'jp', 'kr', 'ar', 'cn', 'es');
/*$languageLabel = array(
	'en' => 'English',
	'ge' => 'German',
	'fr' => 'French',
	'ru' => 'Russian',
	'it' => 'Italian',
	'jp' => 'Japanese',
	'kr' => 'Korean',
	'ar' => 'Arabic',
	'cn' => 'Chinese',
	'es' => 'Spainish'
);*/
$defaultLang = $cf->get('defaultLang');
$sysLang = ($cf->get('multiLang') == 'true') ? $absUri['0'] : $defaultLang;
$sysLang = ($sysLang == '') ? $defaultLang : $sysLang;
if($sysLang != 'admin') {
	if(!in_array($sysLang, $languageSet)) {
		$mw->notfound();
		die();
	}
} else if($sysLang == 'admin') {
	$sysLang = $defaultLang;
}

$userLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
$userLang = (empty($userLang)) ? $defaultLang : $userLang;
$pageName = ($cf->get('multiLang') == 'true') ? $absUri['1'] : $absUri['0'];
$pageName = current(explode('.', $pageName));
$pageName = (empty($pageName)) ? 'home' : $pageName;
$pageName = ($pageName == 'index') ? 'home' : $pageName;
$redirect = $_SERVER['REDIRECT_URL'];
$referer = $_SERVER['HTTP_REFERER'];
$clientIp = $mw->getIP();
$userAgent = $_SERVER['HTTP_USER_AGENT'];

$noFollowPage = explode(',', str_replace(' ', '', $cf->get('noFollowPage')));
$robots = (in_array($pageName, $noFollowPage)) ? 'noindex, nofollow' : 'index, follow';

$tagTitle = $cf->get('tagTitle');
$tagDescription = $cf->get('tagDescription');
$tagKeywords = $cf->get('tagKeywords');
$tagUrl = $fullUrl;
$tagImage = $fullUrl.'image/logo.png';

$requestTime = $_SERVER['REQUEST_TIME'];
$requestDateTime = date('Y-m-d H:i:s', $requestTime);

$sitePhone = '0933325855';
$siteEmail = 'info@pattayasecretescorts.com';
$siteUrl = trim($protocol.$absUrl, '/') . '/';
$httpHost = $_SERVER['HTTP_HOST'];

$bookingEmail = 'enquiries@pattayasecretescorts.com';
$mail_user = $bookingEmail;
$mail_pass = 'm3OrH9gXl7';
$mail_pop = 'mail.pattayasecretescorts.com';
$mail_smtp = 'mail.pattayasecretescorts.com';
$mail_port = '25';

$startYear = '2014';
$thisYear = date('Y', $requestTime);
$copyright = ($thisYear > $startYear) ? $startYear.' - '.$thisYear : $thisYear;

$profilePath = $fullRoot.'image-profile/';
$bannerPath = $fullRoot.'image-banner/';
$imageSet = array('jpg', 'jpeg', 'gif', 'png');
$videoSet = array('mp4', 'wmv', '3gp', 'avi', 'mov');
$videoPath = $fullRoot.'video/';

$actualUrl = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

setcookie('_furl', $fullUrl, 0, $basePath);
setcookie('_fpath', $basePath, 0, $basePath);

function email_link($email, $array = [], $link = true) {
  $link = (bool)(int) $link;
  $title = $array['title'] ? $array['title'] : $email;
  $text = $array['text'] ? $array['text'] : $email;
  $class = $array['class'] ? $array['class'] : '';

  $html = '<a class="%s" href="mailto:%s" title="%s">%s</a>';
  $html = sprintf($html, $class, $email, $title, $text);

  return $link === true ? $html : $text;
}

function make_link($url, $array = [], $link = true) {
  $link = (bool)(int) $link;
  $title = $array['title'] ? $array['title'] : $url;
  $text = $array['text'] ? $array['text'] : $url;
  $class = $array['class'] ? $array['class'] : '';

  $html = '<a class="%s" href="%s" title="%s">%s</a>';
  $html = sprintf($html, $class, $url, $title, $text);

  return $link === true ? $html : $text;
}


function image_holder($size, $alt = '', $array = []) {
    $html = '<img data-src="holder.js/%s?text=%s&bg=%s&fg=%s" class="card-img %s">';

    array_walk_recursive($array, function(&$input, $index) {
        $input = trim($input);

        if ($index == 'bg' || $index == 'fg') {
            $input = str_replace('#', '', $input);
        }
    });

    $options = [
        'bg' => '#977d49',
        'fg' => '#eee',
        'class' => '',
    ];
    $array = array_merge($options, $array);
    $html = sprintf($html, $size, $alt, $array['bg'], $array['fg'], $array['class']);

    return $html;
}
