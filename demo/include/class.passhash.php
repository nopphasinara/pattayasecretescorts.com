<?php
	class Passhash {
		private $ego = '$2a$10$';
		
		function hashPassword($password = '') {
			if(empty($password)) {
				die(__FUNCTION__.': Invalid parameter count.');
			}
			
			$salt = substr(sha1(mt_rand()), 0, 22);
			$hash = sha1($this->ego.$salt.'$'.$password);
			$result = array('hash' => $hash, 'salt' => $salt);
			
			return $result;
		}
		
		function hashCheck($hash = '', $salt = '', $password = '') {
			if(empty($salt) || empty($hash) || empty($password)) {
				die(__FUNCTION__.': Invalid parameter count.');
			}
			
			$full_hash = sha1($this->ego.$salt.'$'.$password);
			if($full_hash != $hash) {
				return false;
			} else {
				return true;
			}
		}
	}
	
	$ph = new Passhash();
?>