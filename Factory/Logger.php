<?php
namespace phpLogger\Factory;
use phpLogger\Helpers\Helpers;
include_once __DIR__."/../Config/autoload.php";

abstract class Logger
{
  private $initialType;
  protected $currentType;

  public static function createLogger(string $type){//this is a factory method
    if(!Helpers::loggerTypeIsValid($type)) trigger_error("Can't create logger of type ".$type.". Invalid type.", E_USER_ERROR);
    $modelsNamespace = "\\phpLogger\\Models";
    $type = $modelsNamespace."\\".ucwords($type)."Logger";
    return new $type();
  }

  abstract public function send(string $message): void;

  public function sendByLogger(string $message, string $type) {
    if( ($this->currentType == $this->initialType) && ($this->currentType == $type) ) {
      $this->send($message);
      return;
    }
    $this::createLogger($type)->send($message);
  }

  public function getType() {
    return $this->currentType;
  }

  public function setType(string $type) {
    if(!Helpers::loggerTypeIsValid($type)) {
      trigger_error("Invalid logger type. Type wasn't set.");
      return;
    }
    $this->currentType = $type;
  }
}
