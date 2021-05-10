<?php
namespace phpLogger\Factory;
use phpLogger\Helpers\Helpers;

abstract class Logger
{
  private $initialType;
  private $currentType;

  /**
  * Sends message to current logger.
  * @param string $message
  * @return void
  */
  abstract protected function send(string $message): void;


  /**
  * Sends message by selected logger.
  * @param string $message
  * @param string $loggerType
  * @return void
  */
  public function sendByLogger(string $message, string $loggerType) {
    if(!Helpers::loggerTypeIsValid()) trigger_error("Invalid logger type", E_USER_ERROR);
    if( ($this->currentType == $this->initialType) && ($this->currentType == $loggerType) ) {
      $this->send($message);
      return;
    }
    (new $loggerType)->send($mssage);
  }


  /**
  * Gets current logger type.
  * @return string
  */
  public function getType() {
    return $this->currentType;
  }


  /**
  * Sets current logger type.
  * @param string $type
  */
  public function setType(string $type) {
    if(!Helpers::loggerTypeIsValid($type)) trigger_error("Invalid logger type", E_USER_ERROR);
    $this->currentType = $type;
  }
}
