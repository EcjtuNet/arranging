<?php
require 'Slim/Slim.php';
require 'Predis-1.0/Autoloader.php';
\Slim\Slim::registerAutoloader();
Predis\Autoloader::register();
$redis = new Predis\Client('tcp://127.0.0.1:6379');

$app = new \Slim\Slim();
$app->get('/:id', function ($id) {
    echo $id;
});
$app->get('/', function () use ($app, $obj) {
	$id = $redis->incr('hr_arranging');
	$app->redirect("/$id");
});


$app->run();