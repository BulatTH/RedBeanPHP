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

//        R::debug(1, 3);

        R::freeze(false);

        // Без отношений
        /*$category = R::dispense("category");
        $category->title = "Samsung";
        $category_id = R::store($category);

        $product = R::dispense("product");
        $product->title = "S8";
        $product->category_id = $category_id;
        R::store($product);*/

        // Реализация связей
        /*$category = R::dispense("category");
        $category->title = "Apple";

        $product1 = R::dispense("product");
        $product1->title = "Iphone 7";

        $product2 = R::dispense("product");
        $product2->title = "Iphone 10";


        $category->ownProductList = [$product1, $product2];
 //        $category->ownProductList[] = $product1;
//        $category->ownProductList[] = $product2;

        R::store($category);
        */


        // Получение собственного списка категорий
        /*$category = R::load("category", 2);

        debug($category);

        echo "<ul> 
            <li>{$category->title}</li>";
            echo "<ul>";
                foreach ($category->ownProductList as $product){
                    echo "<li> {$product->title} </li>";
                }
            echo "</ul>";
        echo "</ul>";*/


        // Добавление еще одного товара
        /*$category = R::load("category", 1);

        $product3 = R::dispense("product");
        $product3->title = "S9";
        $category->ownProductList[] = $product3;
        R::store($category);*/

    }

}