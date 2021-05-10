<?php
namespace phpLogger\Controllers;
use phpLogger\Models\FileLogger;
include_once __DIR__."/../Config/autoload.php";

class LoggerController
{
  /*
  * Sends a log message to the default logger.
  */
  public function log() {
    $fileLogger = new FileLogger();
    $message = "Test";
    $fileLogger->send($message);
  }

  /**
  * Sends a log message to a special logger.
  *
  * @param string $type
  */
  public function logTo(string $type) {

  }

  /**
  * Sends a log message to all loggers.
  */
  public function logToAll() {

  }
}
