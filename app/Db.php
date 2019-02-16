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
        R::setup($db_conf['dsn'], $db_conf['user'], $db_conf['password'], true);
        if (!R::testConnection()) {
            throw new \Exception("Ошибка подключения", 500);
            die();
        }


//        $book = R::load('book', 3);
//        $book = $book->export();
//        debug($book);

//        $books = R::loadAll('book', [1,3]);
//        debug($books);

        $book = R::load('book', 1);
        $book->author = "Джером Сэленджер";
        R::store($book);
    }

}