<?php
namespace Blue\Modules\Users\Controllers\Handler;


abstract class UserHandlerAbstract implements UserHandlerInterface{

  protected $controller;

  public function __construct($controller)
  {
    $this->controller = $controller;

  }
}