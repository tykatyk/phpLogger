<?php
/*
 * If you want to create pure loggers without the controller,
 * import the logger with it's namespace and instantiate the class.
 * For example:
 * use phpLogger\Models\FileLogger;
 * $fileLogger = new FileLogger();
 * $fileLogger->send("Hello word");
 * $fileLogger->setType("db");
 * and so on
 */

use phpLogger\Controller\LoggerController;
include_once __DIR__."/Config/autoload.php";

$controller = new LoggerController();
$message = "Hello word";
$controller->log($message);
