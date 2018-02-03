<?php
namespace Blue\Modules\Users\Models\Dao;

use Rhumsaa\Uuid\Console\Exception;

class User{

  protected $userId = null;
  protected $name = null;
  protected $email = null;
  protected $phone = null;
  protected $password = null;
  protected $params = null;
  protected $status = null;
  protected $createTime = null;

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
    $this->setPhone($data['phone']);
    $this->setName($data['name']);
    $this->setPassword($data['password']);
    $this->setStatus($data['status']);
    $this->setParam($data['params']);
    $this->setCreateTime($data['create_time']);
  }

  /**
   * @param $userId
   */
  public function setId($userId){
    $this->userId = $userId;
  }

  /**
   * @return null
   */
  public function getId(){
    return $this->userId;
  }

  /**
   * @param $name
   */
  public function setName($name){
    $this->name = $name;
  }

  /**
   * @return null
   */
  public function getName(){
    return $this->name;
  }

  /**
   * @param $email
   */
  public function setEmail($email){
    $this->email = $email;
  }

  /**
   * @return null
   */
  public function getPhone(){
    return $this->phone;
  }
  /**
   * @param $email
   */
  public function setPhone($phone){
    $this->phone = $phone;
  }

  /**
   * @return null
   */
  public function getEmail(){
    return $this->email;
  }
  /**
   * @param $password
   */
  public function setPassword($password){
    $this->password = $password;
  }

  /**
   * @return null
   */
  public function getPassword(){
    return $this->password;
  }

  /**
   * @param $status
   */
  public function setStatus($status){
    $this->status = $status;
  }

  /**
   * @return null
   */
  public function getStatus(){
    return $this->status;
  }

  /**
   * @param $params
   */
  public function setParam($params){
    $this->params = $params;
  }

  /**
   * @return null
   */
  public function getParams(){
    return $this->params;
  }

  /**
   * @param $create_time
   */
  public function setCreateTime($createTime){
    $this->createTime = $createTime;
  }

  /**
   * @return null
   */
  public function getCreateTime(){
    return $this->createTime;
  }


}
