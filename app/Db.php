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

        R::debug(1);



//        $data = R::getLook()->look(
//            "SELECT id, title FROM book WHERE id > ?",
//            [5],
//            ['id', 'title'],
//            "\t<li value='%s'>%s</li>", 'strtoupper', "\n"
//        );
//
//        echo "<ul>\n{$data}\n</ul>";

//        $book = null;
//        $didChangePrice = R::matchUp(
//            "book",
//            " title = ?",
//            ["Test book Title 1020"],
//            [
//                "price" => "0"
//            ],
//            [
//                "title" => "Test book Title 1020",
//                "price" => 0,
//                "category_id" => 1
//            ],
//            $book
//        );
//        debug($book);

//        R::csv(
//            "SELECT id, title FROM book WHERE id > ?",
//            [8],
//            ["ID", "TITLE"],
//            __DIR__ . "/file.csv"
//        );


    }

}