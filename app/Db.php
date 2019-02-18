<?php
/**
 * Created by PhpStorm.
 * User: hairutdinovbr
 * Date: 2019-02-16
 * Time: 10:41 AM
 */

namespace app;

use app\traits\TSingleton;
use \RedBeanPHP\R as R;

class Db
{
    use TSingleton;

    private function __construct()
    {
        $db_conf = require_once CONF . "/db_conf.php";
        $db_conf2 = require_once CONF . "/db_conf2.php";
        R::setup($db_conf['dsn'], $db_conf['user'], $db_conf['password'], true);

        if (!R::testConnection()) {
            throw new \Exception("Ошибка подключения", 500);
            die();
        }

        R::debug(1);

//        $fields = R::inspect("book");
//        debug($fields);

//        $listOfTables = R::inspect();
//        debug($listOfTables);


//        R::addDatabase("db2", $db_conf2['dsn'], $db_conf2['user'], $db_conf2['password'], true);
//        R::selectDatabase("db2");

//        $listOfTables2 = R::inspect();
//        debug($listOfTables2);

        /*
        $book = R::dispense("book");
        $category = R::dispense("category");

        $category->category = "bulat's category";

        R::begin();
        try {
            $category_id = R::store($category);

            $book->title = "bulat's first book";
            $book->price = 10;
            $book->category_id = $category_id;

            R::store($book);
            R::commit();
        } catch (\Exception $e) {
            R::rollback();
            echo $e->getMessage();
        }
        */

    }

}