<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/29
 * Time: 14:17
 */

namespace application\admin\models;


use core\mybase\Model;

class SysUserModel extends Model
{

   public  function getUserNameAndPwd($args){
       $sql="SELECT * FROM sysuser WHERE `name`=? AND pwd=? ";
       $result=$this->query($sql,$args);

       if(count($result)>0){
           return $result[0];
       } else{
           return null;
       }

   }

}