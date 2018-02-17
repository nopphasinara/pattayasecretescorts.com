<?php
	class Milkyway extends Database {
		protected $form_id;
		protected $form_response;
		protected $response;
		
		var $command1 = '';
		var $command2 = '';
		var $command3 = '';
		
		public function __construct() {
			$this->form_id = (empty($_POST['form_id'])) ? ((empty($_GET['form_id'])) ? 'form_default' : $_GET['form_id']) : $_POST['form_id'];
			$this->form_response = (empty($_SESSION['form_response'])) ? '' : $_SESSION['form_response'];
			$this->response = (empty($_SESSION['response'])) ? 'text_red' : $_SESSION['response'];
		}
		
		public function get($name = '') {
			if(empty($name)) {
				$this->phpAjax($this->form_id, strtolower('error code {config} in '.__FUNCTION__));
			}
			
			return $this->$name;
		}
		
		function userLogout() {
			global $basePath, $adminUrl;
			
			# Clear user and login $_COOKIE here
			setcookie('_uid', '', time() - 3600, $basePath);
			setcookie('_uis', '', time() - 3600, $basePath);
			setcookie('_uir', '', time() - 3600, $basePath);
			
			header('Location: '.$adminUrl.'index.php?form_id=form_default');
			die();
		}
		
		#################################
			
		function checkLogin($level = '') {
			global $basePath, $adminUrl, $prefix, $clientIp, $userAgent, $requestDateTime;
			
			$_uid = $_COOKIE['_uid'];
			$_uis = $_COOKIE['_uis'];
			$_uir = $_COOKIE['_uir'];
			
			if(empty($_uid) || empty($_uis) || empty($_uir)) {
				$this->userLogout();
			}
			
			$_uir_data = explode('.', $_uir);
			$_uid_num = substr($_uid, $_uir_data['0'], $_uir_data['1']);
			
			$this->connect();
			$data = $this->select(" select * from ".$prefix."users where id = '".$_uid_num."' ");
			$this->close();
			if(!$data || $_uid_num != $data['0']['id']) {
				$this->userLogout();
			}
			
			$data = $data['0'];
			
			if($data['status'] != 'enable') {
				$_SESSION['form_response'] = 'This user has been disabled, please contact Administrator.';
				$this->userLogout();
			}
			
			if($_uis != md5($data['salt'])) {
				$_SESSION['form_response'] = 'Session expired, please login again.';
				$this->userLogout();
			}
			
			if(!empty($level)) {
				if(!is_array($level)) {
					die(__FUNCTION__.' error L');
				}
				
				if($data['level'] != 'system') {
					if(!in_array($data['level'], $level)) {
						$this->forbidden();
					}
				}
			}
			
			$this->command1 = " user_id, update_id, date_time, update_time, ip, user_agent, update_ip, update_user_agent ";
			$this->command2 = " '".$data['id']."', '".$data['id']."', '".$requestDateTime."', '".$requestDateTime."', '".$clientIp."', '".$userAgent."', '".$clientIp."', '".$userAgent."' ";
			$this->command3 = " update_id = '".$data['id']."', update_ip = '".$clientIp."', update_user_agent = '".$userAgent."' ";
			
			return $data;
		}
		
		#################################
		
		function checkSystem() {
			global $prefix;
			
			$this->connect();
			$system = $this->select(" select email, status from ".$prefix."users where level = 'system' ");
			$this->close();
			if(!$system) {
				die('System running into problem, please contact your administrator.');
			}
			
			$total_system = count($system);
			if($total_system > 1) {
				die('System running into problem, please contact your administrator.');
			}
			
			$system = $system['0'];
			
			if($system['email'] != 'system@localhost.com' || $system['status'] != 'enable') {
				die('System running into problem, please contact your administrator.');
			}
		}
		
		#################################
		
		function query($data = '', $name = '') {
			unset($_SESSION[$name]);
			$array = '';
			
			if(empty($data) || empty($name)) {
				
			} else {
				foreach($data as $key => $value) {
					if(is_array($value)) {
						foreach($value as $key2 => $value2) {
							$array[$key][$key2] = addslashes(htmlspecialchars(stripcslashes(trim($value2))));
						}
					} else {
						$array[$key] = addslashes(htmlspecialchars(stripcslashes(trim($value))));
					}
				}

				if(empty($array)) {
					
				} else {
					$_SESSION[$name] = $array;
					return $array;
				}
			}
		}
		
		#################################
		
		function getIP($convert = false) {
			if(!is_bool($convert)) {
				die(__FUNCTION__.' error');
			}
			
			if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip = $_SERVER['REMOTE_ADDR'];
			}
			
			if($convert == true) {
				$ip = ip2long($ip);
			}

			return $ip;
		}
		
		#################################
		
		function mod($string = '') {
			if(empty($string)) {
				die(__FUNCTION__.' error');
			}
			
			$pattern = array('_', '&#95;', '^', '&#94;', '*', '&#42;', '¥', '&#165;', '&yen;', '£', '&#163;', '&pound;', '©', '&#169;', '&copy;', '€', '&#8364;', '@', '&#64;', '%', '&#37;', '+', '&#43;', '=', '&#61;', ':', '(', ')', '&lt;', '&gt;', '&#39;', '&#34;', '&quot;', '&#38;', '&amp;', '&bull;', '•', '&', '?', '>', '<', ',', '/', '%', '$', '&#36;', '#', '&#35;', '.', '\'', '!', '"', ' ', ':', '\\', '----------', '---------', '--------', '-------', '------', '-----', '----', '---', '--', '-');
			$replace = array('-', '-', '-', '-', '-', '-', '-yen-', '-yen-', '-yen-', '-pound-', '-pound-', '-pound-', '-copyright-', '-copyright-', '-copyright-', '-euro-', '-euro-', '-at-', '-at-', '-percent-', '-percent-', '-plus-', '-plus-', '-equal-', '-equal-', '-', '-', '-', '-', '-', '-', '-', '-', '-and-', '-and-', '-', '-', '-and-', '-', '-', '-', '-', '-', '-percent-', '-dollar-', '-dollar-', '-number-', '-number-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');
			
			$string = str_replace($pattern, $replace, trim($string));
			$last_char = substr($string, strlen($string) - 1, 1);
			
			if($last_char == '-') {
				$string = substr($string, 0, strlen($string) - 1);
			}
			
			return strtolower($string);
		}
		
		#################################
		
		function forbidden() {
			$document_root = $_SERVER['DOCUMENT_ROOT'];
			$script_name = explode('/', $_SERVER['SCRIPT_NAME']);
			$script_name = $script_name['1'];
			$path = $document_root.'/'.$script_name.'/';
			(header("HTTP/1.1 403 Forbidden")&require($path.'403.php'));
			die();
		}
		
		#################################
		
		function notfound() {
			$document_root = $_SERVER['DOCUMENT_ROOT'];
			$script_name = explode('/', $_SERVER['SCRIPT_NAME']);
			$script_name = $script_name['1'];
			$path = $document_root.'/'.$script_name.'/';
			(header("HTTP/1.1 404 Forbidden")&require($path.'404.php'));
			die();
		}
		
		#################################
		
		function humanCheck() {
			if(empty($_SERVER['HTTP_USER_AGENT']) || !isset($_SERVER['HTTP_USER_AGENT'])) {
				$this->forbidden();
				die();
			}
		}
		
		#################################
		
		function checkHost() {
			$byPass = parse_url($_SERVER['HTTP_REFERER']);
			$port = (!isset($byPass['port']) || empty($byPass['port'])) ? '' : ':'.$byPass['port'].'';
			$http_host = $byPass['host'].$port;
			
			if($http_host != $_SERVER['HTTP_HOST']) {
				$this->forbidden();
			}
		}
		
		#################################
		
		function checkEmail($email = '') {
			if(empty($email) || !is_array($email)) {
				die(__FUNCTION__.' error');
			}
			
			$total_email = count($email);
			$error = false;
			for($i = 0; $i < $total_email; $i++) {
				if(!preg_match('#^[a-z0-9.!\#$%&\'*+-/=?^_`{|}~]+@([0-9.]+|([^\s]+\.+[a-z]{2,6}))$#si', trim($email[$i]))) {
					$error = true;
					break;
				}
			}
			
			if($error == true) {
				return false;
			} else {
				return true;
			}
		}
		
		#################################
		
		function phpAjax($form_id = '', $text = '', $stop_die = 'no', $reset = 'no') {
			if(empty($form_id) || empty($text)) {
				die(__FUNCTION__.' error E');
			}
			
			echo '<script>';
			echo '$(\'#'.$form_id.' input[type="password"]\').attr(\'value\', \'\');';
			if($reset == 'yes') {
				echo 'document.getElementById(\''.$form_id.'\').reset();';
			}
			echo '</script>';
			
			if($stop_die == 'yes') {
				echo('<script>$(\'#'.$form_id.' .form_response\').append(\''.$text.'\').removeClass(\'text_red\').removeClass(\'text_green\').removeClass(\'text_hint\').addClass(\'text_red\').removeClass(\'hidden\');</script>');
			} else {
				die('<script>$(\'#'.$form_id.' .form_response\').html(\''.$text.'\').removeClass(\'text_red\').removeClass(\'text_green\').removeClass(\'text_hint\').addClass(\'text_red\').removeClass(\'hidden\');</script>');
			}
		}
		
		#################################
		
		function checkBlacklist($string = '') {
			if(empty($string)) {
				die('Warning! error config in '.__FUNCTION__);
			}
			
			$real_string = $string;
			
			$blacklist = array('fuck', 'fuckyou', 'fuck-you', 'root', 'localhost', 'system', 'admin', 'administrator', 'moderator', 'system@localhost.com', 'admin@localhost.com');
			if(in_array(strtolower($this->mod($string)), $blacklist)) {
				return false;
			} else {
				return true;
			}
		}
		
		#################################
		
		function createTableList($position = '', $order = array('name', 'status', 'date_time')) {
			if(empty($position)) {
				die(__FUNCTION__.' error C');
			}
			
			if(!is_array($order)) {
				die(__FUNCTION__.' error O');
			}
			
			global $script_link, $next_sort;
			
			$table_data = array(
				'header' => '<table width="100%" border="0" cellpadding="0" cellspacing="0">
								<tr class="list_title">
									<td class="first"><input type="checkbox" name="check_all" value="" class="check_all" /></td>
									<td><a href="'.$script_link.'&order_by='.$order['0'].'&sort_by='.$next_sort.'">Name</a></td>
									<td class="status"><a href="'.$script_link.'&order_by='.$order['1'].'&sort_by='.$next_sort.'">Status</a></td>
									<td class="last"><a href="'.$script_link.'&order_by='.$order['2'].'&sort_by='.$next_sort.'">Date Added</a></td>
								</tr>',
				'footer' => '</table>'
			);
			
			return $table_data[$position];
		}
		
		#################################
		
		function lockedData($data_id = '', $locked = 'no') {
			if(empty($data_id) || empty($locked)) {
				die(__FUNCTION__.' error D');
			}
			
			global $fullUrl;
			
			$locked = strtolower($locked);
			if($locked == 'yes') {
				$data = '<img src="'.$fullUrl.'image/icon-lock.png" width="24" />';
			} else {
				$data = '<input type="checkbox" name="delete[]" value="'.$data_id.'" class="check_item" />';
			}
			
			return $data;
		}
		
		#################################
		
		function makeLangButton() {
			global $languageSet, $fullUrl;
			
			$result = '';
			$active = 'active';
			foreach($languageSet as $key => $value) {
				$result .= '<div class="button_lang '.$value.' inline give_break5"><a href="javascript:;" class="'.$active.'" data-lang="'.$value.'"><img src="'.$fullUrl.'image/icon-'.$value.'.png" width="40" alt="'.$value.'" /></a></div>';
				$active = '';
			}
			
			if(empty($result)) {
				die(__FUNCTION__.' error E');
			} else {
				return $result;
			}
		}
		
		#################################
		
		function makeCkeditor($input = '') {
			if(empty($input)) {
				die(__FUNCTION__.' error I');
			}
			
			global $fullUrl, $languageSet;
			
			$result = '<script type="text/javascript">';
			
			foreach($languageSet as $key => $value) {
				$result .= 'CKEDITOR.replace( \''.$input.'_'.$value.'\', {
					customConfig : \''.$fullUrl.'ckeditor/standard-config.js\',
					filebrowserBrowseUrl : \''.$fullUrl.'ckfinder/ckfinder.html\',
					filebrowserImageBrowseUrl : \''.$fullUrl.'ckfinder/ckfinder.html?type=Images\',
					filebrowserFlashBrowseUrl : \''.$fullUrl.'ckfinder/ckfinder.html?type=Flash\',
					filebrowserUploadUrl : \''.$fullUrl.'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files\',
					filebrowserImageUploadUrl : \''.$fullUrl.'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images\',
					filebrowserFlashUploadUrl : \''.$fullUrl.'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash\',
					width: \'640px\',
					height: \'240px\'
				});';
			}
			
			$result .= '</script>';
			
			return $result;
		}
		
		#################################
		
		function autoIncrement($table = '') {
			if(empty($table)) {
				die(__FUNCTION__.' error E');
			}
			
			global $xss;
			
			if(empty($xss['form_id'])) {
				die(__FUNCTION__.' error X');
			}
			
			$table = $this->query(array($table), 'css');
			$table = $table['0'];
			
			$this->connect();
			$autoincrement = $this->select(" select auto_increment from information_schema.tables where table_name = '".$table."' ");
			$this->close();
			if(!$autoincrement) {
				$this->phpAjax($xss['form_id'], 'Cannot load id from '.__FUNCTION__);
			}
			
			return $autoincrement['0']['auto_increment'];
		}
		
		#################################
		
		function returnError($form_id = 'form_default', $url = '', $text = '', $response = '') {
			if(empty($url)) {
				die('error code {config} in '.__FUNCTION__);
			}
			
			$_SESSION['form_id'] = empty($form_id) ? 'form_default' : $form_id;
			$_SESSION['form_response'] = $text;
			$_SESSION['response'] = (empty($response)) ? 'text_red' : $response;
			header('Location: '.$url);
			die();
		}
		
		#################################
		
		function getRecord($table = '', $id = '', $return = '') {
			if(empty($table) || empty($id)) {
				die('Warning! error config in '.__FUNCTION__.'.');
			}
			
			$field = " * ";
			if(!empty($return)) {
				$field = $return;
			}
			
			$this->connect();
			$data = $this->select(" select ".$field." from ".$table." where id = '".$id."' ");
			$this->close();
			if(!$data || $data['0']['id'] != $id) {
				die('Warning! record not found in '.__FUNCTION__.'.');
			}
			
			$data = $data['0'];
			
			return $data;
		}
		
		#################################
		
		function getThumbnail($profile_id = '', $mode = '') {
			if(empty($profile_id)) {
				die('Warning! error config in '.__FUNCTION__.'.');
			}
			
			global $prefix;
			
			$limit = (empty($mode) || $mode == 'thumbnail') ? " limit 0, 1 " : "";
			
			$this->connect();
			$data = $this->select(" select file_name from ".$prefix."photos where profile_id = '".$profile_id."' order by _order asc ".$limit." ");
			$this->close();
			if(!$data) {
				$data = 'empty.jpg';
			} else {
				if(empty($mode) || $mode == 'thumbnail') {
					$data = $data['0']['file_name'];
				}
			}
			
			return $data;
		}
		
		#################################
		
		function getProfileId() {
			if(SESSIONID == '') {
				die('Warning! error config in '.__FUNCTION__.'.');
			}
			
			global $prefix;
			
			$this->connect();
			$data = $this->select(" select id, sessionid from ".$prefix."profiles where sessionid = '".SESSIONID."' limit 0, 1 ");
			$this->close();
			if(!$data || $data['0']['sessionid'] != SESSIONID) {
				die('Warning! cannot load record.');
			}
			
			return $data['0']['id'];
		}
		
		#################################
		
		function getProfile($where = '', $value = '') {
			if(empty($where) || empty($value)) {
				die('Warning! error config in '.__FUNCTION__.'.');
			}
			
			global $prefix;
			
			$this->connect();
			$data = $this->select(" select * from ".$prefix."profiles where ".$where." = '".$value."' limit 0, 1 ");
			$this->close();
			if(!$data || $data['0'][$where] != $value) {
				die('Warning! cannot load record '.__FUNCTION__.'.');
			}
			
			return $data['0'];
		}
		
		#################################
		
		function saveLog($table = '', $id = '', $mode = '') {
			if(empty($table) || empty($id)) {
				die('Warning! error config in '.__FUNCTION__.'.');
			}
			
			global $prefix, $profilePath;
			
			$this->report = true;
			
			$this->showfield = true;
			$this->connect();
			$data = $this->select(" select * from ".$prefix.$table." limit 0, 1 ");
			$this->close();
			if(!$data) {
				die('Warning! cannot load record in '.__FUNCTION__.'.');
			}
			
			$this->showfield = false;
			
			$this->connect();
			if($mode == 'delete') {
				$this->command(" update ".$prefix.$table." set status = 'deleted', ".$this->command3." where id = '".$id."' ");
			}
			$insert = $this->command(" insert into ".$prefix.$table."_log (".implode(', ', $data).") select * from ".$prefix.$table." where id = '".$id."' ");
			if($mode == 'delete') {
				$this->command(" delete from ".$prefix.$table." where id = '".$id."' ");
				if($table == 'profiles') {
					$this->command(" delete from ".$prefix.$table."_service where profile_id = '".$id."' ");
				}
			}
			$this->close();
			if(!$insert) {
				die('Warning! cannot save log file '.__FUNCTION__.'.');
			} else {
				return true;
			}
		}
		
		#################################
		
		function lastUpdate($update_time = '', $update_id = '') {
			if(empty($update_time) || empty($update_id)) {
				die('Warning! error config in '.__FUNCTION__.'.');
			}
			
			$data = 'Updated on '.date('d M Y H:i:s', strtotime($update_time));
			
			global $prefix;
			
			$this->connect();
			$author = $this->select(" select name from ".$prefix."users where id = '".$update_id."' ");
			$this->close();
			$author = (!$author || empty($author['0']['name'])) ? '-' : $author['0']['name'];
			
			$data .= ' By '.$author;
			
			return $data;
		}
		
		#################################
		
		function checkService($profile_id = '', $service_id = '') {
			if(empty($profile_id) || empty($service_id)) {
				die('Warning! error config in '.__FUNCTION__.'.');
			}
			
			global $prefix;
			
			$this->connect();
			$check = $this->select(" select id from ".$prefix."profiles_service where profile_id = '".$profile_id."' and service_id = '".$service_id."' ");
			$this->close();
			if(!$check) {
				$data = 'unchecked';
			} else {
				$data = 'checked';
			}
			
			return $data;
		}
		
		#################################
		
		function getRating($id = '') {
			if(empty($id)) {
				die('Warning! error config in '.__FUNCTION__.'.');
			}
			
			global $prefix;
			
			$total_rate = 0;
			$rate = '';
			
			$this->connect();
			$data = $this->select(" select rate from ".$prefix."reviews where status = 'enable' and profile_id = '".$id."' ");
			$this->close();
			if(!$data) {
				$rate = '0%';
			} else {
				$total_item = count($data);
				for($i = 0; $i < $total_item; $i++) {
					$total_rate = $total_rate + 10;
					$rate = $rate + $data[$i]['rate'];
				}
				
				$average = ($rate * 100) / $total_rate;
				$rate = number_format($average, 0, '', '').'% from '.$total_item.' reviews';
			}
			
			return $rate;
		}
		
		#################################
	}
	
	$mw = new Milkyway();
?>