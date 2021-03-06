<?php
require 'Slim/Slim.php';
require 'predis-1.0/src/Autoloader.php';
\Slim\Slim::registerAutoloader();
Predis\Autoloader::register();
define('REDIS_BASE_KEY', 'hr_arranging')
date_default_timezone_set("Asia/Shanghai");

//估算时间
function calc ($id) {
	$redis = new Predis\Client('tcp://127.0.0.1:6379');
	$cur = $redis->get(REDIS_BASE_KEY.':cur');
	$per = $redis->get(REDIS_BASE_KEY.':per');
	$min = floor(ceil(($id - $cur)/6) * $per / 60);
	$time = time();
	$return_min = floor(date("i", strtotime("+$min minutes", $time))/10)*10;
	return date("G", strtotime("+$min minutes", $time)) . ":" . ($return_min == 0 ? '00' : $return_min );
}

$app = new \Slim\Slim();
//强行排号
$app->get('/new', function () use ($app) {
	$redis = new Predis\Client('tcp://127.0.0.1:6379');
	$id = $redis->incr(REDIS_BASE_KEY);
	$app->redirect("/index.php/$id");
});
$app->get('/:id', function ($id) {
	$time = calc($id);
    require 'show.php';
});
//设置每组平均时间，单位秒
$app->get('/per/:sec', function ($sec) {
	$redis = new Predis\Client('tcp://127.0.0.1:6379');
	$redis->set(REDIS_BASE_KEY.':per', $sec);
});
//设置当前正在面试的人的id
$app->get('/cur/:id', function ($id) {
	$redis = new Predis\Client('tcp://127.0.0.1:6379');
	$redis->set(REDIS_BASE_KEY.':cur', $id);
});
//取估算时间
$app->get('/:id/time', function ($id) {
	return calc($id);
});
$app->get('/', function () use ($app) {
	session_start();
	if (isset($_SESSION['id'])) {
		$id = $_SESSION['id'];
	} else {
		$redis = new Predis\Client('tcp://127.0.0.1:6379');
		$id = $redis->incr(REDIS_BASE_KEY);
		$_SESSION['id'] = $id;
	}
	$app->redirect("/index.php/$id");
});

$app->run();