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

        R::debug(1, 3);

        $book = R::findOne("book");
        $books_title = R::getCol("SELECT title FROM book WHERE id = ? ORDER BY id DESC", [4]);

        $parametrs = ["Hello, Wolrd!", 1, 55];
        /*R::exec("INSERT INTO book (title, price, category_id) VALUES (". R::genSlots($parametrs) .")", $parametrs);

        $insertedId = R::getInsertID();
        debug($insertedId);*/



    }

}