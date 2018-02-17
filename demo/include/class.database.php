<?php
	$prefix = 'sw_';

  // require('class.database2.php');

	class Database {
		public $report = false;
		public $showfield = false;
		private $host = 'localhost';
		private $username = '';
		private $password = '';
    private $database = '';

		function checkConfig() {
      $dbconfig = get_config('database');
      $this->host = $dbconfig['host'];
      $this->username = $dbconfig['username'];
      $this->password = $dbconfig['password'];
      $this->database = $dbconfig['database'];

      if(empty($this->host) || empty($this->database) || empty($this->username) || empty($this->password)) {
				die('Missing config for database.');
			}
		}

		function connect() {
      $this->checkConfig();

			if(!is_bool($this->report)) {
				die(__FUNCTION__.': The parameter is invalid.');
			}

			$sql = @mysql_connect($this->host, $this->username, $this->password);
			$report = ($this->report) ? ' ('.mysql_error().')' : '';
			if(!$sql) {
				die('Cannot connect to database.'.$report);
			}

			$sql = @mysql_select_db($this->database);
			$report = ($this->report) ? ' ('.mysql_error().')' : '';
			if(!$sql) {
				die('Cannot select database.'.$report);
			}

			@mysql_query("SET NAMES 'UTF8'");

			return true;
		}

		function close() {
			if(!is_bool($this->report)) {
				die(__FUNCTION__.': The parameter is invalid.');
			}

			$sql = @mysql_close();
			$report = ($this->report) ? ' ('.mysql_error().')' : '';
			if(!$sql) {
				die('Cannot disconnect database.'.$report);
			}

			return true;
		}

		function select($query) {
			if(!is_bool($this->report)) {
				die(__FUNCTION__.': The parameter is invalid.');
			}

			if(empty($query) || !isset($query)) {
				die(__FUNCTION__.': MySQL command is empty.');
			}

			$sql = @mysql_query($query);
			$report = ($this->report) ? ' ('.mysql_error().')' : '';
			if(!$sql) {
				die('Cannot run your command.'.$report);
			} else {
				$row = @mysql_num_rows($sql);
				if(!$row) {
					return false;
				} else {
					$i = 0;
					while($i < @mysql_num_fields($sql)) {
						$field = @mysql_fetch_field($sql, $i);
						$array_field[] = $field->name;
						$field = '';
						$i = $i + 1;
					}

					if($this->showfield === true) {
						return $array_field;
					} else {
						$i = 0;
						while($row = @mysql_fetch_array($sql)) {
							foreach($array_field as $key => $value) {
								$data[$i][''.$value.''] = $row[''.$value.''];
							}

							$i = $i + 1;
						}

						$i = '';
						$array_field = '';
						$row = '';
						$sql = '';

						return $data;
					}
				}
			}
		}

		function command($query) {
			if(!is_bool($this->report)) {
				die(__FUNCTION__.': The parameter is invalid.');
			}

			if(empty($query) || !isset($query)) {
				die(__FUNCTION__.': MySQL command is empty.');
			}

			$sql = @mysql_query($query);
			$report = ($this->report) ? ' ('.mysql_error().')' : '';
			if(!$sql) {
				die('Cannot run your database.'.$report);
			} else {
				return true;
			}
		}
	}

	$db = new Database();
