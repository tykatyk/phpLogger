<?php
namespace phpLogger\Helpers;
use const phpLogger\Config\LOGGERS;
use const phpLogger\Config\DEFAULT_LOGGER;
include_once __DIR__."/../Config/settings.php";

class Helpers {
  public static function loggerTypeIsValid(string $type) {
    $loggerTypes = array_keys(LOGGERS);
    return in_array($type, $loggerTypes, true) ? true : false;
  }

  public static function emailIsValid(string $address) {
    $address = filter_var($address, FILTER_SANITIZE_EMAIL);
    return filter_var($address, FILTER_VALIDATE_EMAIL) ? true : false;
  }

  public static function getDefaultLoggerType() {
    return DEFAULT_LOGGER;
  }

  public static function messageIsEmpty(string $message) {
    return (strlen($message) == 0 ? true : false);
  }

  //Checks if a message ends with a new line symbol.
  //This is just to be sure that log messages will be readable when displayed
  public static function messageHasNewLineChar(string $message) {
    return ($message[strlen($message) - 1] == "\n" ? true : false);
  }
}
