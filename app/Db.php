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

//        $books = R::findAll('book');

//        $collection = R::findCollection('book');
//        while ($item = $collection->next()) {
////            debug($item);
//            $item->price = 3;
//            R::store($item);
//        }

//        debug($collection);

//        $books = R::findLike('book',
//            ['title'=>[ "Book #1", "Book #9"]]
//        );
//        debug($books);


//        $book = R::findOrCreate("book", [
//            'title'=>'my book',
//            'price' => 3.99
//        ]);
//        debug($book);

        $booksWithCategory = R::findMulti('book,category', '
            SELECT book.*, category.* FROM book
            INNER JOIN category ON category.id=book.category_id
            WHERE category.id=:cat_id
        ', [':cat_id'=>2]);

        debug($booksWithCategory);

    }

}