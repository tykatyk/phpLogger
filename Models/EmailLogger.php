<?php
namespace phpLogger\Models;
use phpLogger\Helpers\Helpers;
use phpLogger\Factory\Logger;
use const \phpLogger\Config\LOGGERS;
include_once __DIR__."/../Config/autoload.php";
include_once __DIR__."/../Config/loggerConfig.php";

class EmailLogger extends Logger
{
  private $address;

  public function __construct() {
    $this->initialType = $this->currentType = "email";
    if(!Helpers::emailIsValid(LOGGERS['email']['to'])) {
      trigger_error("'".LOGGERS['email']['to']."' not valid email address", E_USER_ERROR);
    }
    $this->$address = LOGGERS['email']['to'];
  }

  public function send(string $message):void {
    if(Helpers::messageIsEmpty($message)) return;
    if(!Helpers::messageHasNewLineChar($message)) $message = $message."\n";
    $message = wordwrap($message, 70, "\r\n");

    if($this->currentType != $this->initialType) {
      sendByLogger($message, $this->currentType);
      return;
    }

    $to = LOGGERS['email']['to'];
    $subject = LOGGERS['email']['subject'];
    $additional_headers = LOGGERS['email']['additional_headers'];
    $additional_params = LOGGERS['email']['additional_params'];

    $result = mail($to, $subject, $message, $additional_headers, $additional_params);
    if($result === false) trigger_error("Can't send to ".$to. ". Unknown error");
  }
}
