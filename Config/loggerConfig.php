<?php
namespace phpLogger\Config;

define("phpLogger\Config\LOGGERS", [
  "email" => [
    "address" => "example@com.ua"
  ],
  "database" => [
    "DB_CONN" => "mySQL",
    "DB_HOST" => "",
    "DB_NAME" => "",
    "DB_USER" => "",
    "DB_PASSWORD" => ""
  ],
  "file" => [
    "path" => str_replace("/", DIRECTORY_SEPARATOR, __DIR__."/../Storage/log.txt"),
  ]
]);

define("phpLogger\Config\DEFAULT_LOGGER", "file");
