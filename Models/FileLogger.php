<?php
namespace phpLogger\Models;
use phpLogger\Helpers\Helpers;
use phpLogger\Factory\Logger;
use const \phpLogger\Config\LOGGERS;
include_once __DIR__."/../Config/autoload.php";
include_once __DIR__."/../Config/settings.php";

class FileLogger extends Logger
{
  private $path;

  public function __construct() {
    $this->initialType = $this->currentType = "file";
    if(strlen(LOGGERS['file']['path']) == 0) trigger_error("A path to write a log file is empty", E_USER_ERROR);
    $this->path = LOGGERS['file']['path'];
  }

  public function send(string $message):void {
    if(Helpers::messageIsEmpty($message)) {
      echo ("Nothing to log. Message is empty.");
      return;
    };
    if(!Helpers::messageHasNewLineChar($message)) $message = $message."\r\n";

    //make sure the logger will correctly send a message even if it's type was dynamically changed
    if($this->currentType != $this->initialType) {
      sendByLogger($message, $this->currentType);
      return;
    }

    $result = file_put_contents($this->path, $message, FILE_APPEND | LOCK_EX);
    if($result === false){
      trigger_error("Can't log to file ".$loggers->file->path);
    } else {
      echo "'".$message."' was sent via ".$this->getType();
    }
  }
}
