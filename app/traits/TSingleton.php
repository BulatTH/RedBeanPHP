<?php
/**
 * Created by PhpStorm.
 * User: hairutdinovbr
 * Date: 2019-02-16
 * Time: 10:42 AM
 */

namespace app\traits;


trait TSingleton
{

    private static $instance;

    public static function getInstance()
    {
        if (self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
    }

}