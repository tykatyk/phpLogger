<?php
/*
* This is a configuration file.
* It describes available loggers and their settings.
* You can add new loggers here.
*/

namespace phpLogger\Config;

define("phpLogger\Config\LOGGERS", [

  "email" => [//before sending emails configure SMTP in php.ini
    "to" => "client@mail.com",//destination address
    "subject" => "New message from phpLogger",
    "additional_headers" => [
      "From" => "phplogger@mail.com",//this header is required to successfully send emails
    ],
    "additional_params" => ""
  ],
  //Before sending logs to a database, change settings in this array according to your database configuration.
  //You can also use phplogger.sql dump to quickly create a log table.
  "db" => [
    "host" => "127.0.0.1",
    "database" => "phplogger",
    "user" => "root",
    "password" => ""
  ],
  "file" => [
    //This is just a default path for FileLogger to store it's logs.
    //You are welcome to chage it according to your preferences
    "path" => str_replace("/", DIRECTORY_SEPARATOR, __DIR__."/../Storage/log.txt"),
  ]
]);

//sets default logger
define("phpLogger\Config\DEFAULT_LOGGER", "file");
