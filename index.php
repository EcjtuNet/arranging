<?php
require 'Slim/Slim.php';
require 'predis-1.0/src/Autoloader.php';
\Slim\Slim::registerAutoloader();
Predis\Autoloader::register();

$app = new \Slim\Slim();
$app->get('/:id', function ($id) {
	$time = '19:20';
    require 'show.php';
});
$app->get('/', function () use ($app) {
        $redis = new Predis\Client('tcp://127.0.0.1:6379');
        $id = $redis->incr('hr_arranging');
        $app->redirect("/index.php/$id");
});


$app->run();