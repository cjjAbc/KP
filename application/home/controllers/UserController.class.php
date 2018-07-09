<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/29
 * Time: 14:25
 */

namespace application\home\controllers;


use application\home\models\UserModel;
use core\mybase\HomeGroupController;
use core\mybase\MySession;

class UserController  extends HomeGroupController
{
    public  function register(){
        $feedback=["errno"=>500,"mess"=>"注册失败"];
         $uname=$_POST['uname_reg'];
        $upwd=$_POST['upwd_reg'];
        $uemail=$_POST['uemail_reg'];
        $args=[$uname,md5($upwd),$uemail];
        $um=new UserModel();
         $result=$um->add($args);
        if($result>0){
            $feedback=["errno"=>200,"mess"=>"注册成功"];

        }
        echo json_encode($feedback,JSON_UNESCAPED_UNICODE);
    }
    public function  checkUser(){
        $uname=$_POST['uname'];
        $args=[$uname];
        $um=new UserModel();
        $result=$um->getUser($args);
        echo   $result;
    }
    public function main()
    {
        $this->assign("uid",MySession::getSession("uid"));
        $this->assign("uname",MySession::getSession("uname"));
        $this->assign("uemail",MySession::getSession("uemail"));
        $doctors=[["id"=>1001,"name"=>"zhangsan"],
            ["id"=>1002,"name"=>"z"],
            ["id"=>1003,"name"=>"l"]
            ];
        $this->assign("doctors", $doctors);
        $this->display();
    }
    public function  login()
    {
        $feedback = ["errno" => 500, "mess" => "登录失败，请重新登录！"];
        $uname = $_POST['uname'];
        $upwd = $_POST['upwd'];
        $remember = isset($_POST["remember"]) ? true : false;
        if ($uname != null && $upwd != null) {
            $args = [$uname, md5($upwd)];
            $um = new UserModel();
            $result = $um->getUserNameAndPwd($args);
            if ($result != null) {
                $feedback = ["errno" => 200, "mess" => "登录成功"];
                 MySession::startSession();
                 MySession::setSession("uid",$result["uid"]);
                 MySession::setSession("uname",$result["uname"]);
                 MySession::setSession("uemail",$result["uemail"]);
                 MySession::setSession("remember",$remember);
                 if($remember){
                     MySession::extendSession();
                 }
            }
        }
        echo json_encode($feedback,JSON_UNESCAPED_UNICODE);
    }
    public function  forget()
    {
        $feedback = ["errno" => 500, "mess" => "该邮箱不存在！"];
        $uemail = $_POST['uemail_get'];
        $args=[$uemail];
        $um = new UserModel();

        $result=$um->getUser($args);
        echo   $result;

    }


}