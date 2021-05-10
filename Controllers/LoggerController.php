<?php
namespace phpLogger\Controllers;
use phpLogger\Factory\Logger;
use phpLogger\Models\FileLogger;
use phpLogger\Models\EmailLogger;
use phpLogger\Models\DBLogger;
use phpLogger\Helpers\Helpers;
use const phpLogger\Config\LOGGERS;
include_once __DIR__."/../Config/autoload.php";

class LoggerController
{
  private $message = "Message from default log method";

  public function log() {
    $type = Helpers::getDefaultLoggerType();
    (Logger::createLogger($type))->send($message);
  }

  public function logTo(string $type) {
    (Logger::createLogger($type))->send($message);
  }

  public function logToAll() {
    $types = array_keys(LOGGERS);
    
    foreach($types as $type) {
      (Logger::createLogger($type))->send($message);
    }
  }
}
