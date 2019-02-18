<?php
require_once "conf/init.php";

$db = \app\Db::getInstance();

$logs = \RedBeanPHP\R::getDatabaseAdapter()->getDatabase()->getLogger();

debug($logs->grep("SELECT"));
