<?php
namespace phpLogger\Factory;
use phpLogger\Helpers\Helpers;

//This is a logger factory
abstract class Logger
{
  private $initialType;
  private $currentType;

  public static function createLogger(string $logger){
    if(!Helpers::loggerTypeIsValid($logger)) trigger_error("Invalid logger type", E_USER_ERROR);
    return new $logger();
  }

  abstract protected function send(string $message): void;

  public function sendByLogger(string $message, string $loggerType) {
    if(!Helpers::loggerTypeIsValid()) trigger_error("Invalid logger type", E_USER_ERROR);
    if( ($this->currentType == $this->initialType) && ($this->currentType == $loggerType) ) {
      $this->send($message);
      return;
    }
    (new $loggerType)->send($mssage);
  }

  public function getType() {
    return $this->currentType;
  }

  public function setType(string $type) {
    if(!Helpers::loggerTypeIsValid($type)) trigger_error("Invalid logger type", E_USER_ERROR);
    $this->currentType = $type;
  }
}
