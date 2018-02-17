<?php
ini_set('post_max_size', '96M');
ini_set('upload_max_filesize', '64M');
ini_set('memory_limit', -1);
ini_set('max_execution_time', 0);
ini_set('max_input_time', 0);

ob_start();

function get_config($item = null) {
  $config_item = require(__DIR__ . '/configs.php');
  return ((string) $item && (string) $item != '') ? $config_item[$item] : $config_item;
}

require(__DIR__ . '/include/class.database.php');
require(__DIR__ . '/include/class.config.php');
require(__DIR__ . '/include/class.passhash.php');
require(__DIR__ . '/include/class.php');
require(__DIR__ . '/include/global.php');

if(!file_exists($fullRoot.'include/config-'.$sysLang.'.php')) {
  require(__DIR__ . '/include/config-'.$defaultLang.'.php');
} else {
  require(__DIR__ . '/include/config-'.$sysLang.'.php');
}

$mw->humanCheck();
$mw->checkSystem();

if(!file_exists($fullRoot.$sysLang.'/'.$pageName.'.php')) {
  $mw->notfound();
  die();
} else {
  require($fullRoot.$sysLang.'/'.$pageName.'.php');
  echo '<!--this is DDBE-->';
}

require($fullRoot.'include/class.clear.php');

ob_end_flush();
