<?php
use phpLogger\Controllers\LoggerController;
include_once __DIR__."/Config/autoload.php";

$message = "Hello word";
(new LoggerController())->log($message);
//(new LoggerController())->logTo($message, "email");
