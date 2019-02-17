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

//        R::wipe('book');
//        $bookArr = [];
//        for ($a = 1; $a < 11; $a+=1 ) {
//            $bookArr[$a] = R::dispense('book');
//            $bookArr[$a]->title = "Book #{$a}";
//            $bookArr[$a]->price = $a + rand(1,5);
//            R::store($bookArr[$a]);
//        }

//        $books = R::find('book', 'price > ?', [10]);
//        $books = R::find('book', 'title LIKE ?', ['%#10%']);

//        $books = R::find('book', 'id > ? AND price > ?', [7, 10]);
//        $books = R::find('book', 'id > :id AND price > :price', [":id" => 7, ":price" => 10]);

//        $ids = [1,3,5];
//        $books = R::find('book', 'id IN (?, ?, ?)', $ids);
//        $books = R::find('book', 'id IN ('.R::genSlots($ids).')', $ids);


//        $book = R::findOne('book', 'id > ?', [8]);
//        $books = R::findAll('book');

        R::hunt('book', 'id > ?', [5]);
        
    }

}