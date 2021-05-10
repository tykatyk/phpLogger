<?php
namespace phpLogger\Models;
use phpLogger\Helpers\Helpers;
use phpLogger\Factory\Logger;
use const \phpLogger\Config\LOGGERS;
include_once __DIR__."/../Config/autoload.php";
include_once __DIR__."/../Config/loggerConfig.php";

class DbLogger extends Logger
{
  private $host, $database, $user, $password, $conn;

  public function __construct() {
    $this->initialType = $this->currentType = "db";
    $this->host = LOGGERS["db"]["host"];
    $this->database = LOGGERS["db"]["database"];
    $this->user = LOGGERS["db"]["user"];
    $this->password = LOGGERS["db"]["password"];
    $this->conn = new \mysqli($this->host, $this->user, $this->password, $this->database);
    if($this->conn->connect_errno) trigger_error("Can't connect to the database. ".$this->conn->connect_errno, E_USER_ERROR);
  }

  public function send(string $message):void {
    if(Helpers::messageIsEmpty($message)) return;
    if(!Helpers::messageHasNewLineChar($message)) $message = $message."\n";

    if($this->currentType != $this->initialType) {
      sendByLogger($message, $this->currentType);
      return;
    }
    $sql = "INSERT INTO LOGS(message) VALUES("."'".$message."')";
    if(!$this->conn->query($sql)){
      trigger_error("Can't log to the database: (".$mysqli->errno . ") ".$mysqli->error);
    } else {
      echo "'".$message."' was sent via ".$this->currentType;
    }
  }
}
