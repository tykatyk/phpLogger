<?php
namespace phpLogger\Models;
use phpLogger\Helpers\Helpers;
use phpLogger\Factory\Logger;
use const \phpLogger\Config\LOGGERS;
include_once __DIR__."/../Config/autoload.php";
include_once __DIR__."/../Config/loggerConfig.php";

class FileLogger extends Logger
{
  private $path;

  public function __construct() {
    $this->initialType = $this->currentType = "file";
    $this->path = LOGGERS['file']['path'];
  }

  public function send(string $message):void {
    if(Helpers::messageIsEmpty($message)) return;
    if(!Helpers::messageHasNewLineChar($message)) $message = $message."\n";

    if($this->currentType != $this->initialType) {
      sendByLogger($message, $this->currentType);
      return;
    }

    $result = file_put_contents($this->path, $message, FILE_APPEND | LOCK_EX);
    if($result === false)  trigger_error("Can not write to file ".$loggers->file->path);
  }
}
