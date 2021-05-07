<?php
include_once "./Config/LoggerTypes.php";

function loggerTypeIsValid(string $type)
{
  if(in_array($type, $loggerTypes, true)) return true;
  return false;
}
