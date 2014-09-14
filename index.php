<?php
require 'Slim/Slim.php';
require 'predis-1.0/src/Autoloader.php';
\Slim\Slim::registerAutoloader();
Predis\Autoloader::register();

$app = new \Slim\Slim();
$app->get('/:id', function ($id) {
	$redis = new Predis\Client('tcp://127.0.0.1:6379');
	$cur = $reids->get('hr_arranging:cur');
	$per = $redis->get('hr_arranging:per')
	$time = ($id <= $cur ? '00:00' : function ($id, $cur, $per) {
		$min = floor(($id - $cur)/6) * $per / 60;
		$time = time();
		return data("G", strtotime("+$min minutes", $time)) . ":" . floor(data("i", strtotime("+$min minutes", $time))/10)*10;
	});
    require 'show.php';
});
$app->get('/per/:sec', function ($sec) {
	$redis = new Predis\Client('tcp://127.0.0.1:6379');
	$redis->set('hr_arranging:per', $sec);
});
$app->get('/cur/:id', function ($id) {
	$redis = new Predis\Client('tcp://127.0.0.1:6379');
	$redis->set('hr_arranging:cur', $id);
});
$app->get('/', function () use ($app) {
    $redis = new Predis\Client('tcp://127.0.0.1:6379');
    $id = $redis->incr('hr_arranging');
    $app->redirect("/index.php/$id");
});

$app->run();