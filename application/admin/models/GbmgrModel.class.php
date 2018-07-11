<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 14:13
 */

namespace application\admin\models;


use core\mybase\Model;

class GbmgrModel  extends Model
{
//   public  function  list($args=null){
//        $sql="select * from guestbook";
//        return $this->query($sql,$args);
//   }
   public function count($like=null){

       $sql=null;
       if($like!=null){
           $sql="select count(1) as total from guestbook where uname like '%".$like."%'";
       }else{
           $sql="select count(1) as total from guestbook";
       }
       $result=$this->query($sql,null);
       return $result[0]["total"];
   }
    public  function list($pageIndex=1,$pageSize=10,$like=null){
        $sql=null;
        if($like!=null){
            $sql=" select * from guestbook  where uname like '%".$like."%'order by id desc limit ".($pageIndex-1)*$pageSize.",".$pageSize;
        }else{
            $sql=" select * from guestbook order by id desc limit ".($pageIndex-1)*$pageSize.",".$pageSize;
        }
        return $this->query($sql,null);
    }
    public function del($args){
        $sql="delete from guestbook where id=?";
        return $this->execute($sql,$args);
    }
}