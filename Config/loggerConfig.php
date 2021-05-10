<?php
namespace phpLogger\Config;

//This file describes available loggers and their configuration.
//New loggers can also be added here
define("phpLogger\Config\LOGGERS", [

  "email" => [//before sending emails make sure you have SMTP configured in php.ini
    "to" => "tykatyk@gmail.com",
    "subject" => "New message from phpLogger",
    "additional_headers" => [
      "From" => "vinashelter@gmail.com",//<-this header is required to successfully send emails
      "Reply-To" => "webmaster@phpLogger.com",
      "X-Mailer" => "PHP//".phpversion()
    ],
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
