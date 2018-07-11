<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 9:39
 */
namespace  application\admin\controllers;

use application\admin\models\SysUserModel;
use core\mybase\AdminGroupController;
use core\mybase\MySession;
class LoginController extends  AdminGroupController
{
    public function  index(){
        $this->display();
    }
    public function  login()
    {
        $feedback = ["errno" => 500, "mess" => "用户名不存在"];
        $account =   isset($_POST["account"]) ? $_POST['account'] : null;
        $password =  isset($_POST['password']) ?$_POST['password']: null;
        $sysremember = isset($_POST["sysremember"]) ? true : false;
        if ($account != null && $password != null) {
            $args = [$account, md5($password)];
            $sum = new SysUserModel();
            $result = $sum->getUserNameAndPwd($args);
            if ($result != null) {
                $feedback = ["errno" => 200, "mess" => "登录成功"];
                MySession::startSession();
                MySession::setSession("id",$result["id"]);
                MySession::setSession("name",$result["name"]);
                MySession::setSession("sysremember",$sysremember);
                if($sysremember){
                    MySession::extendSession();
                }
            }
        }
        echo json_encode($feedback,JSON_UNESCAPED_UNICODE);
    }
    public  function  logout(){
        MySession::destorySession();
        header("location:index.php?g=admin&c=login&a=index");
    }
}