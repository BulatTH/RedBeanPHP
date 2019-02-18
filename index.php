<?php
require_once "conf/init.php";

$db = \app\Db::getInstance();

$logs = \RedBeanPHP\R::getDatabaseAdapter()->getDatabase()->getLogger();

debug($logs->grep("SELECT"));
debug($logs->grep("INSERT"));
debug($logs->grep("UPDATE"));
debug($logs->grep("DELETE"));
