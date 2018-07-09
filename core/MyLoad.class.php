<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/27
 * Time: 10:53
 */
namespace core;
class MyLoad
{
    public static function myAutoLoad($className){
        //完成由命名空间构成的类路径信息的类文件的加载
        //例如：Application\Admin\Controller\AdminController
        //问题：include等加载函数使用的是正斜杠路径，需要进行转换为：Application/Admin/Controller/AdminController.".class.php"
        $path=str_replace("\\","/",$className);
        $filePath=$path.".class.php";
        if(file_exists($filePath)) {
            include_once $filePath;
        }else{
            die("无法加载文件：".$filePath);
        }
    }


    //注册自动加载函数
    public static function registerAutoLoad(){
        spl_autoload_register("self::myAutoLoad");
    }
}