<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/29
 * Time: 14:17
 */

namespace application\home\models;


use core\mybase\Model;

class UserModel extends Model
{
   public  function  add($args){
       $sql="insert into  tuser  VALUES(DEFAULT,?,?,?)";
        return $this->execute($sql,$args);
   }
   public function  getUser($args){
       $sql="select count(1)  as result from tuser where uname=? ";
       $result =$this->query($sql,$args);
       return $result[0]['result'];
   }
   public  function getUserNameAndPwd($args){
       $sql="SELECT * FROM tuser WHERE uname=? AND upwd=? ";
       $result=$this->query($sql,$args);

       if(count($result)>0){
           return $result[0];
       } else{
           return null;
       }

   }
    public function  getEmail($args){
        $sql="select count(1)  as result from tuser where uemail=? ";
        $result =$this->query($sql,$args);
        return $result[0]['result'];
    }

}