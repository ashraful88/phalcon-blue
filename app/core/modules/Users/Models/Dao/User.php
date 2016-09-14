<?php
namespace Blue\Modules\Users\Models\Dao;

use Rhumsaa\Uuid\Console\Exception;

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
   * @param $data
   */
  public function init($data)
  {
    if(!is_array($data)){
      throw new Exception('No data available to init');
    }
    $this->setId($data['user_id']);
    $this->setEmail($data['email']);
    $this->setName($data['name']);
    $this->setPassword($data['password']);
    $this->setStatus($data['status']);
    $this->setParam($data['param']);
    $this->setCreateTime($data['create_time']);
  }

  /**
   * @param $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  /**
   * @return null
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param $name
   */
  public function setName($name)
  {
    $this->name = $name;
  }

  /**
   * @return null
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param $email
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }

  /**
   * @return null
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * @param $password
   */
  public function setPassword($password)
  {
    $this->password = $password;
  }

  /**
   * @return null
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * @param $status
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }

  /**
   * @return null
   */
  public function getStatus()
  {
    return $this->status;
  }

  /**
   * @param $params
   */
  public function setParam($params)
  {
    $this->params = $params;
  }

  /**
   * @return null
   */
  public function getParams()
  {
    return $this->params;
  }

  /**
   * @param $create_time
   */
  public function setCreateTime($create_time)
  {
    $this->create_time = $create_time;
  }

  /**
   * @return null
   */
  public function getCreateTime()
  {
    return $this->create_time;
  }


}