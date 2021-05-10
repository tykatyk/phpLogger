<?php
namespace phpLogger\Helpers;
use const phpLogger\Config\LOGGERS;
use const phpLogger\Config\DEFAULT_LOGGER;

class Helpers {
  public static function loggerTypeIsValid(string $type) {
    $loggerTypes = array_keys(LOGGERS);
    if(in_array($type, $loggerTypes, true)) return true;
    return false;
  }

  public static function getDefaultLogger() {
    return DEFAULT_LOGGER;
  }

  public static function messageIsEmpty($message) {
    if(strlen($message) == 0) return true;
    return false;
  }

  public static function messageHasNewLineChar(string $message) {
    if($message[strlen($message) - 1] == "\n") return true;
    return false;
  }
}
