<?php
namespace phpLogger\Controller;
use phpLogger\Factory\Logger;
use phpLogger\Helpers\Helpers;
use const phpLogger\Config\LOGGERS;
include_once __DIR__."/../Config/autoload.php";

class LoggerController
{
  public function log(string $message) {
    $defaultType = Helpers::getDefaultLoggerType();
    (Logger::createLogger($defaultType))->send($message);
  }

  public function logTo(string $message, string $type) {
    (Logger::createLogger($type))->send($message);
  }

  public function logToAll(string $message) {
    $types = array_keys(LOGGERS);
    foreach($types as $type) {
      (Logger::createLogger($type))->send($message);
    }
  }
}
