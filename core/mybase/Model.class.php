<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/28
 * Time: 15:46
 */

namespace core\mybase;


class Model
{
    private $dsn = 'mysql:dbname=mytour;host=localhost';
    private $user = 'root';
    private $password = '666';
    private $option = array(
        \PDO::ATTR_PERSISTENT => TRUE,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_ORACLE_NULLS => true
    );
    private  $pdo;
    public function __construct()
    {
        global $C;
        $this->dsn=isset($C['db']['dsn'])?$C['db']['dsn']: $this->dsn;
        $this->user=isset($C['db']['user'])?$C['db']['user']: $this->user;
        $this->password=isset($C['db']['password'])?$C['db']['password']: $this->password;
        $this->option=isset($C['db']['option'])?$C['db']['option']: $this->option;

    }
    public  function  getPDO(){
        if($this->pdo==null){
            $this->pdo=new \PDO($this->dsn,$this->user,$this->password,$this->option);
        }
        return $this->pdo;
    }
    public  function  destoryPDO(){
        if($this->pdo!=null){
            $this->pdo=null;
        }
    }
    public  function  execute($sql,$args){
        $result = 0;
        try {
            $pdostmt = $this->getPDO()->prepare($sql);
            if ($args != null) {
                for ($i = 0; $i < count($args); $i++) {
                    $pdostmt->bindParam($i + 1, $args[$i]);
                }
            }
            $pdostmt->execute();
            $result = $pdostmt->rowCount();
        } catch (\PDOException $e) {
            echo "持久化异常：" . $e->getMessage();
        }
        return $result;

    }
    public  function  query($sql,$args){

        try {
            $pdostmt = $this->getPDO()->prepare($sql);
            if ($args != null) {
                for ($i = 0; $i < count($args); $i++) {
                    $pdostmt->bindParam($i + 1, $args[$i]);
                }
            }
            $pdostmt->execute();
            return $pdostmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "持久化异常：" . $e->getMessage();
            return null;
        }


    }



}