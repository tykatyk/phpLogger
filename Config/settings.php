<?php
/*
* This file describes available loggers and their configuration.
* New loggers have to be added to this array
*/

namespace phpLogger\Config;

define("phpLogger\Config\LOGGERS", [

  "email" => [//before sending emails configure SMTP in php.ini
    "to" => "",//destination address
    "subject" => "New message from phpLogger",
    "additional_headers" => [
      "From" => "",//this header is required to successfully send emails
    ],
    "additional_params" => ""
  ],
  //before sending logs to a database, change settings in this array according to your database configuration
  //you can also use phplogger.sql dump to quickly create a log table
  "db" => [
    "host" => "127.0.0.1",
    "database" => "phpLogger",
    "user" => "root",
    "password" => ""
  ],
  "file" => [
    //this is just a default path for FileLogger to store it's stats_cdf_logs
    //you are welcome to chage it according to your preferences
    "path" => str_replace("/", DIRECTORY_SEPARATOR, __DIR__."/../Storage/log.txt"),
  ]
]);

//sets default logger
define("phpLogger\Config\DEFAULT_LOGGER", "file");
