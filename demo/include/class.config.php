<?php
	class Config extends Database {
		var $config = null;
		
		function get($field = '') {
			global $prefix;
			
			if(empty($field)) {
				die(__FUNCTION__.': Field is empty.');
			}
			
			$this->report = true;
			$this->connect();
			$config = $this->select(" select ".$field." from ".$prefix."config limit 0, 1 ");
			$this->close();
			if(!$config) {
				die('Cannot load config data.');
			}
			
			return $config['0'][$field];
		}
	}
	
	$cf = new Config();
?>