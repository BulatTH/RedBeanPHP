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

//        R::freeze(false);

        // Many-to-many

        /*$category1 = R::dispense("category");
        $category1->title = "Футболки мужские";

        $category2 = R::dispense("category");
        $category2->title = "Футболки женские";

        $product = R::dispense("product");
        $product->title = "Футболка унисекс";

        $category1->sharedProductList[] = $product;
        $category2->sharedProductList[] = $product;

        R::storeAll([$category1, $category2]);*/



        /*$category1 = R::load("category", 1);
        $category2 = R::load("category", 2);

        $product = R::dispense("product");

        $category1->sharedProductList[] = $product;
        $category2->sharedProductList[] = $product;

        R::storeAll([$category1, $category2]);*/


        /*$product = R::load("product", 2);
        $product->sharedCategoryList;
        debug($product);*/


        // Deleting
        /*$product2 = R::load("product", 2);
        R::trash($product2);*/
        
    }

}