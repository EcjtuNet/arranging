<?php
require 'Slim/Slim.php';
require 'predis-1.0/src/Autoloader.php';
\Slim\Slim::registerAutoloader();
Predis\Autoloader::register();

date_default_timezone_set("Asia/Shanghai");
function calc ($id, $cur, $per){
		$min = floor(($id - $cur)/6) * $per / 60;
		$time = time();
		$return_min = floor(date("i", strtotime("+$min minutes", $time))/10)*10;
		return date("G", strtotime("+$min minutes", $time)) . ":" . ($return_min == 0 ? '00' : $return_min );
}

$app = new \Slim\Slim();
$app->get('/:id', function ($id) {
	$redis = new Predis\Client('tcp://127.0.0.1:6379');
	$cur = $redis->get('hr_arranging:cur');
	$per = $redis->get('hr_arranging:per');
	$time = ($id <= $cur ? '00:00' : calc($id, $cur, $per));
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