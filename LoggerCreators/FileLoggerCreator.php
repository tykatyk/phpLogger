<?php

class FileLoggerCreator implements LoggerFactory
{
  public function loggerFactory()
  {
    return new FileLogger();
  }
}
