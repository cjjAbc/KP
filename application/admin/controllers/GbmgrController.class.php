<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 9:38
 */
namespace  application\admin\controllers;
use application\admin\models\GbmgrModel;
use core\mybase\AdminGroupController;
use core\mybase\Controller;

class GbmgrController extends AdminGroupController

{
    public function  index(){
        $this->display();
    }


    public  function list(){
        $pageIndex=isset($_GET['pageIndex'])?$_GET['pageIndex']:1;
        $pageSize=isset($_GET['pageSize'])?$_GET['pageSize']:10;
        $like=isset($_GET['like'])?$_GET['like']:null;
        $gm= new GbmgrModel();
        $total=$gm->count($like);
        $list=$gm->list($pageIndex,$pageSize,$like);
        $result= ["total"=>$total,"rows"=>$list];
        echo json_encode($result,JSON_UNESCAPED_UNICODE);
    }
    public  function  del(){
        $id=isset($_GET['id'])?$_GET['id']:-1;
        $gm=new GbmgrModel();
        $result=$gm->del([$id]);
        header("location:index.php?g=admin&c=main&a=gbmgr");
    }


}