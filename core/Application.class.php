<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/27
 * Time: 10:52
 */
namespace core;
class Application
{
    public static $group;
    public static $controller;
    public static $action;

    public static function run()
    {
        global $C;
        self:: $group = isset($_GET['g']) ? $_GET['g'] : $C['default_route']['group'];
        self:: $controller = isset($_GET['c']) ? $_GET['c'] : $C['default_route']['controller'];
        self:: $action = isset($_GET['a']) ? $_GET['a'] : $C['default_route']['action'];

        self:: $group = strtolower(self:: $group);
        self:: $controller = ucfirst(strtolower(self:: $controller));
        self:: $action = strtolower(self::$action);
        $controllerName = self::controName();
        $controllerInstance = new $controllerName();
        $method = self::$action;
        $controllerInstance->$method();
    }

    public static function controName()
    {
        return "\\application\\" . self::$group . "\\controllers\\" . self::$controller . "Controller";
    }
}