<?php
namespace Blue\Modules\Blog\Models;

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Model;
use Phalcon\Db;
use Phalcon\Config;
/**
* Post DAO
*/
class PostDAO extends Model
{
  private $postId = null;
  private $title = null;
  private $body = null;
  private $params = null;
  private $status = null;
  private $userId = null;
  private $createTime = null;
  private $publishTime = null;

  public function __construct($post = null)
  {
    if($post!=null){
      $this->setPost($post);
    }
  }

  public function setTitle($title){
    $this->title = $title;
  }
  public function setBody($body){
    $this->body = $body;
  }
  public function setStatus($status){
    $this->status = $status;
  }
  public function setId($postId){
    $this->postId = $postId;
  }
  public function setParams($params){
    $this->params = $params;
  }
  public function setUserId($userId){
    $this->userId = $userId;
  }
  public function setCreateTime($createTime){
    $this->createTime = $createTime;
  }
  public function setPublishTime($publishTime){
    $this->publishTime = $publishTime;
  }
  public function setPost($post){
    $this->postId = $post["postId"];
    $this->title = $post["title"];
    $this->body = $post["body"];
    $this->params = $post["prams"];
    $this->status = $post["status"];
    $this->userId = $post["userId"];
    $this->createTime = $post["createTime"];
    $this->publishTime = $post["publishTime"];
  }
  public function getPost(){
    $post = [
      "postId"      => $this->postId,
      "title"       => $this->title,
      "body"        => $this->body,
      "params"      => $this->params,
      "status"      => $this->status,
      "userId"      => $this->userId,
      "createTime"  => $this->createTime,
      "publishTime" => $this->publishTime
    ];
    return $post;
  }

}
