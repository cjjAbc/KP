<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/27
 * Time: 15:33
 */

namespace core\mybase;


use core\Application;

class Controller
{
    protected $view;
    public function __construct()
    {
        $this->initView();
    }
    private function initView(){
        $this->view=new Views();
        $this->view->view_dir="application/".Application::$group."/views/".strtolower(Application::$controller)."/";
    }
//    protected function display($name=null){
//        $this->view->display($name);
//    }
//    protected function  assign($name,$value){
//        $this->view->assign($name,$value);
//    }

}