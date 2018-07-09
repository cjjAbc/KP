<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/3
 * Time: 16:56
 */

namespace core\mybase;
use core\Application;

class AdminGroupController extends Controller
{
   private  $pass=array("index","login");
   public  function __construct()
   {
       parent::__construct();
       $this->initSession();
       $this->checkLogin();
   }
   private function  initSession(){
      MySession::startSession();
   }
   private  function checkLogin(){
       if(in_array(Application::$action,$this->pass)){

       }else{
           if(isset($_SESSION["sysremember"])){

           }else{
               header("location:index.php?g=admin&c=login&a=index");
           }
       }
   }
}