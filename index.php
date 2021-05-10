<?php
use phpLogger\Controllers\LoggerController;
use phpLogger\Models\FileLogger;
use phpLogger\Models\EmailLogger;
include_once __DIR__."/Config/autoload.php";

(new LoggerController())->log();
/*$fl = new FileLogger();
echo($fl->getType());
$fl->setType("email");
echo($fl->getType());*/

new EmailLogger();
