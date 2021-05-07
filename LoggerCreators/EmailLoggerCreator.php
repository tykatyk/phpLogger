<?php

class EmailLoggerCreator implements LoggerFactory
{
  public function loggerFactory()
  {
    return new EmailLogger();
  }
}
