<?php

class DBLoggerCreator implements LoggerFactory
{
  public function loggerFactory()
  {
    return new DBLogger();
  }
}
