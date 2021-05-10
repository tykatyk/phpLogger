<?php
namespace phpLogger\Models;
use phpLogger\Helpers\Helpers;
use phpLogger\Factory\Logger;
use const \phpLogger\Config\LOGGERS;
include_once __DIR__."/../Config/autoload.php";
include_once __DIR__."/../Config/settings.php";

class EmailLogger extends Logger
{
  private $address;

  public function __construct() {
    $this->initialType = $this->currentType = "email";
    if(!Helpers::emailIsValid(LOGGERS['email']['to'])) {
      trigger_error("'".LOGGERS['email']['to']."' not valid email address", E_USER_ERROR);
    }
    $this->address = LOGGERS['email']['to'];
  }

  public function send(string $message):void {
    if(Helpers::messageIsEmpty($message)) {
      echo ("Nothing to log. Message is empty.");
      return;
    };
    if(!Helpers::messageHasNewLineChar($message)) $message = $message."\r\n";
    $message = wordwrap($message, 70, "\r\n");

    //make sure the logger will correctly send a message even if it's type was dynamically changed
    if($this->currentType != $this->initialType) {
      sendByLogger($message, $this->currentType);
      return;
    }

    $to = LOGGERS['email']['to'];
    $subject = LOGGERS['email']['subject'];
    $additional_headers = LOGGERS['email']['additional_headers'];
    $additional_params = LOGGERS['email']['additional_params'];

    $result = mail($to, $subject, $message, $additional_headers, $additional_params);
    if($result === false){
      trigger_error("Can't log to ".$to. ". Unknown error");
    } else {
      echo "'".$message."' was sent via ".$this->getType();
    }
  }
}
