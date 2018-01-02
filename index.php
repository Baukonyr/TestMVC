<?php
// frontController


define ('ROOT',dirname(__FILE__));
// Общие настройки.
require_once (ROOT . '/config/configuration.php');
//include_once (ROOT . '/components/constant.php');

// Подключения автозагрузки классов
require_once (ROOT . '/component/autoload.php');

// Подключния контроллера.


$router = new router();
$router->start();
?>