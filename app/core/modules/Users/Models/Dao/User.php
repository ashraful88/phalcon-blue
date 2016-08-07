<?php

class User
{
  protected $id = null;
  protected $name = null;
  protected $email = null;
  protected $password = null;
  protected $params = null;
  protected $status = null;
  protected $create_time = null;

  protected $error = null;

  protected $data = null;

  public function __construct($data = null)
  {
    $this->data = $data;
  }

  /**
   *
   */
  protected function init()
  {

  }

  /**
   * @param $id
   */
  protected function setId($id)
  {
    $this->id = $id;
  }

  /**
   * @return null
   */
  protected function getId()
  {
    return $this->id;
  }

  /**
   * @param $name
   */
  protected function setName($name)
  {
    $this->name = $name;
  }

  /**
   * @return null
   */
  protected function getName()
  {
    return $this->name;
  }

  /**
   * @param $email
   */
  protected function setEmail($email)
  {
    $this->email = $email;
  }

  /**
   * @return null
   */
  protected function getEmail()
  {
    return $this->email;
  }

  /**
   * @param $password
   */
  protected function setPassword($password)
  {
    $this->password = $password;
  }

  /**
   * @return null
   */
  protected function getPassword()
  {
    return $this->password;
  }

  /**
   * @param $status
   */
  protected function setStatus($status)
  {
    $this->status = $status;
  }

  /**
   * @return null
   */
  protected function getStatus()
  {
    return $this->status;
  }

  /**
   * @param $params
   */
  protected function setParam($params)
  {
    $this->params = $params;
  }

  /**
   * @return null
   */
  protected function getParams()
  {
    return $this->params;
  }

  /**
   * @param $create_time
   */
  protected function setCreateTime($create_time)
  {
    $this->create_time = $create_time;
  }

  /**
   * @return null
   */
  protected function getCreateTime()
  {
    return $this->create_time;
  }


}