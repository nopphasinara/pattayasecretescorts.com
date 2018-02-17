<?php
	$prefix = 'sw_';

  function conn() {
    global $db;
    return $db->dbconn;
  }

	class Database {
		public $report = false;
		public $showfield = false;
    public $dbconn = false;
		private $host = '127.0.0.1';
		private $port = 3306;
		private $username = 'root';
		private $password = '2hdbfgur';
		// private $username = 'ddtweb_pse';
		// private $password = '22HdbfguR@';
    private $database = 'ddtweb_pse';

		function checkConfig() {
			if(empty($this->host) || empty($this->database) || empty($this->username) || empty($this->password)) {
				die('Missing config for database.');
			}
		}

		function connect() {
      $this->conn();
      return;

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

      $db = conn();
      $db->close();

			return true;
		}

		function select($query) {
			if(!is_bool($this->report)) {
				die(__FUNCTION__.': The parameter is invalid.');
			}

			if(empty($query) || !isset($query)) {
				die(__FUNCTION__.': MySQL command is empty.');
			}

      $db = conn();
      $sql = $db->query($query = 'select * from sw_users');
      if ($db->error) {
        die($db->error);
      }

      $array_field = array();
      foreach ($sql->fetch_fields() as $key => $field) {
        $array_field[] = $field->name;
      }

      if ($this->showfield === true) {
        return $array_field;
      }

      $data = array();
      if ($sql->num_rows) {
        while ($row = $sql->fetch_assoc()) {
          $data[] = $row;
        }
      }

      $sql->free();
      $sql->free_result();

      return $data;
		}

		function command($query) {
			if(!is_bool($this->report)) {
				die(__FUNCTION__.': The parameter is invalid.');
			}

			if(empty($query) || !isset($query)) {
				die(__FUNCTION__.': MySQL command is empty.');
			}

      exit('aaa');

			$sql = @mysql_query($query);
			$report = ($this->report) ? ' ('.mysql_error().')' : '';
			if(!$sql) {
				die('Cannot run your database.'.$report);
			} else {
				return true;
			}
		}

    public function conn() {
      $conn = @new mysqli("$this->host:$this->port", $this->username, $this->password, $this->database);
      if ($conn->connect_error) {
        die($conn->connect_error);
      }

      $conn->query("SET NAMES 'UTF8'");
      if ($conn->error) {
        die($conn->error);
      }

      return $this->dbconn = $conn;
    }
	}

	$db = new Database();
  $db->checkConfig();
  $db->conn();
?>
