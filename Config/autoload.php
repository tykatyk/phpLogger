<?php
//namespace phpLogger\config;
const ROOT = __DIR__."\\..\\..\\";

spl_autoload_register(function($className){
  $file = ROOT.$className.".php";
  $file = str_replace("\\", DIRECTORY_SEPARATOR, $file);
  if(file_exists($file)) include_once $file;
});
