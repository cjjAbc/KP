<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 9:39
 */

namespace application\admin\controllers;

use core\mybase\AdminGroupController;
use core\mybase\Controller;

class MainController extends AdminGroupController
{
    public function main()
    {
        $this->display();
    }

    public function gbmgr()
    {
        $this->display();
    }

    public function bookmgr()
    {
        $this->display();
    }

    public function newsmgr()
    {
        $this->display();
    }

    public function usermgr()
    {
        $this->display();
    }


}