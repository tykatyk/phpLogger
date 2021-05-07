<?php
include_once "./helpers.php";

class FileLogger implements LoggerInterface
{
  private $type;

  public function __construct()
  {
    $this->type = "file";
  }

  public function send(string $message)
  {
    sendByLogger($message, $this->type);
  }

  public function sendByLogger(string $message, string $loggerType)
  {

  }

  public function getType()
  {
    return $this->type;
  }

  public function setType(string $type)
  {
    if(!loggerTypeIsValid()) //not completely implemented
    $this->type = $type;
  }
}
