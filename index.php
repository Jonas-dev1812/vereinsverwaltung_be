<?php

require_once("bootstrap.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = explode('/', $uri);

$type = $uri[3];
$controllerClass = new ReflectionClass("api\controller\\" . ucwords($type) . "Controller");

$id = null;

if (isset($uri[4]) && is_numeric($uri[4])) {
	$id = (int) $uri[4];
}
$requestMethod = $_SERVER["REQUEST_METHOD"];

$controller = $controllerClass->newInstance($requestMethod, $id);
$controller->processRequest();
