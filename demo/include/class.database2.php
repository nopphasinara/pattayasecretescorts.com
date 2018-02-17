<?php

set_exception_handler('setError');

/*
* Database
*/
class Database2 {

  protected $host = '127.0.0.1';
  protected $port = '3306';
  protected $username = 'root';
  protected $password = '2hdbfgur';
  protected $database;

  protected $error;
  protected $dbconn;
  protected $is_connected;

  public function __construct(string $database) {
    $this->run([
      'database' => $database,
    ]);
  }

  public function run(array $array = []) {
    $this->is_connected = 0;
    $this->dbconn = new stdClass;
    $this->error = new stdClass;

    $this->resetError();
    $this->setDatabase($array['database']);
    $this->setCharset('UTF8');
  }

  public function setDatabase(string $database) {
    return $this->database = $database;
  }

  public function setCharset(string $charset = 'UTF8') {
    return $this->query("SET NAMES '". $charset ."'");
  }

  public function connect() {
    if (!$this->checkConfig()) return $this->setError(1, 'Missing configuration data.');

    $conn = @new mysqli("$this->host:$this->port", $this->username, $this->password, $this->database);
    if ($conn->connect_error) {
      $this->setError($conn->connect_errno, $conn->connect_error, 1);
    }

    $this->is_connected = 1;
    $this->dbconn = $conn;

    return $this->dbconn;
  }

  public function isConnected() {
    $this->is_connected = (int) $this->is_connected;
    if (!$this->is_connected) $this->setError(1, 'No database connection', 1);
    return 1;
  }

  public function query(string $query) {
    $this->connect();
    $this->isConnected();

    $query = $this->dbconn->query($query);
    if ($this->dbconn->error) {
      $this->setError($this->dbconn->errno, $this->dbconn->error);
    }

    $result = [];
    while ($row = $query->fetch_assoc()) {
      $result[] = $row;
    }

    $this->disconnect();

    return $result;
  }

  public function disconnect() {
    if (!$this->is_connected) return;

    $this->dbconn->close();
    $this->is_connected = 0;
    $this->dbconn = new stdClass;
    $this->error = new stdClass;
  }

  public function resetError() {
    $this->setError(0, '');
  }

  public function setError(int $code = 0, string $message = '', int $exit = 0) {
    if (!$exit) $exit = 0;
    $this->error->code = $code;
    $this->error->message = $message;

    if ($message) {
      throw new Exception(json_encode([
        'message' => $message,
        'code' => $code,
      ]), $exit);
    }
  }

  public function checkConfig() {
    return ( !$this->host || !$this->port || !$this->username || !$this->password || !$this->database) ? false : true;
  }

  public function getConfig() {
    $query = $this->query("SELECT * FROM sw_users");
    echo "<pre>"; print_r($query); echo "</pre>";
    echo "<pre>"; print_r($this); echo "</pre>";
  }
}

function setError($e) {
  $error = json_decode($e->getMessage());
  $code = $e->getCode();
  $message = $error->message;
  $exit = $e->getCode();

  if ($exit == 0) {
    echo $message;
  } elseif ($exit == 1) {
    die($message);
  } else {
    return (object) [
      'code' => $code,
      'message' => $message,
      'e' => $e,
    ];
  }

  return;
}

$db2 = new Database2('ddtweb_pse');
$db2->getConfig();
