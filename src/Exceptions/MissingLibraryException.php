<?php

namespace Drupal\charts\Exceptions;

class MissingLibraryException extends Exception{
  private $moduleName;

  public function __construct($moduleName) {
    $this->$moduleName = $moduleName;
  }

  public function missingLibrary(){

    return 'Missing Library or libraries '.$this->moduleName;
  }
}