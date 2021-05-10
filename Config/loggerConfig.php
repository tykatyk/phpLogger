<?php
namespace phpLogger\Config;

//available loggers and their configuration
//new loggers can be added here
define("phpLogger\Config\LOGGERS", [
  "email" => [
    "to" => "tykatyk@gmail.com",
    "subject" => "New message from phpLogger",
    "additional_headers" => [],
    "additional_params" => ""
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

//sets default logger
define("phpLogger\Config\DEFAULT_LOGGER", "file");
