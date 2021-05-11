<?php
namespace phpLogger\Config;

spl_autoload_register(function($className){
  $root = __DIR__."\\..\\..\\";
  $file = $root.$className.".php";
  $file = str_replace("\\", DIRECTORY_SEPARATOR, $file);
  if(file_exists($file)) include_once $file;
});
