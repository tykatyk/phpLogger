<?php
use phpLogger\Controllers\LoggerController;
use phpLogger\Models\FileLogger;
include_once __DIR__."/Config/autoload.php";

(new LoggerController)->log();
$fl = new FileLogger();
echo($fl->getType());
$fl->setType("email");
echo($fl->getType());
