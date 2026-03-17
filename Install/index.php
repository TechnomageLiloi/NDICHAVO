<?php

ini_set('display_errors', 'On');
session_start();
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

define('ROOT_URL', '');
define('ROOT_PATH', __DIR__);

include_once __DIR__ . '/PlaceOfPower.phar';

$app = new \Liloi\PlaceOfPower\Application([
    'root' => __DIR__ . '/Sandbox' // Here you must change to real folder
]);

echo $app->compile();