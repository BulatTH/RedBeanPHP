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
//            $bookArr[$a]->price = $a;
//            $bookArr[$a]->category_id = rand(1,5);
//            R::store($bookArr[$a]);
//        }
//
//        R::wipe("category");
//        $categoryArr = [];
//        for ($a = 1; $a < 6; $a+=1 ) {
//            $categoryArr[$a] = R::dispense('category');
//            $categoryArr[$a]->category = "Category #" . $a;
//            R::store($categoryArr[$a]);
//        }

//        var_dump( R::exec("UPDATE book SET title = :title WHERE id = 5", [
//            ":title" => "new title #5"
//        ]) );

//        $books = R::getAll("SELECT * FROM book WHERE id > ?", [3]);
//        debug($books);

        R::debug(1);

//        $book = R::getRow("SELECT * FROM book LIMIT 1");
//        $books = R::getCol("SELECt title FROM book");
//        $book = R::getCell("SELECt title FROM book LIMIT 1");

//        $books = R::getAll("SELECT id, title FROM book WHERE id > ?", [8]);
//        $books = R::getAssoc("SELECT * FROM book WHERE id > ?", [8]);


//        R::exec("INSERT INTO book(title, price, category_id) VALUES (?, ?, ?)", [
//            "Wow, new boook",
//            "7",
//            "3",
//        ]);
//        $id = R::getInsertID();
//        debug($id);

    }

}