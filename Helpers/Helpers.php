<?php
namespace phpLogger\Helpers;
use const phpLogger\Config\LOGGERS;
use const phpLogger\Config\DEFAULT_LOGGER;

class Helpers {
  public static function loggerTypeIsValid(string $type) {
    $loggerTypes = array_keys(LOGGERS);
    return in_array($type, $loggerTypes, true) ? true : false;
  }

  public static function emailIsValid(string $address) {
    return filter_var($address, FILTER_VALIDATE_EMAIL) ? true : false;
  }

  public static function getDefaultLoggerType() {
    return DEFAULT_LOGGER;
  }

  public static function messageIsEmpty(string $message) {
    return (strlen($message) == 0 ? true : false);
  }

  public static function messageHasNewLineChar(string $message) {
    return ($message[strlen($message) - 1] == "\n" ? true : false);
  }
}
