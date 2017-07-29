<?php
namespace Blue\Modules\Blog\Models;

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Model;
use Phalcon\Db;
use Phalcon\Config;
use Phalcon\Http\Request;
use Blue\Modules\Blog\Models\PostDAO;
/**
 * Posts Model
 */
class Posts extends Model
{
  protected $dao;
  public function __construct(){
    $this->dao = new PostDAO();
  }
  public function getPosts(){

  }
  public function getPostById(){

  }
  public function getPostBySlug(){

  }
  public function createPost($request){
    $this->dao->setTitle($request->getPost('title'));
    $this->dao->setBody($request->getPost('body'));
  }
  public function deletePost($request){
    $this->dao->setId($request->getPost('id'));
  }

}
