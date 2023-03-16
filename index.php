<?php

use Domain\Models\Club\Club;
use Domain\Models\Club\ClubFactory;
use RDGW\Club\ClubFinder;

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
$customEndpoint = null;

if (isset($uri[4]) && is_numeric($uri[4])) {
	$id = (int) $uri[4];
} else if (isset($uri[4])) {
	$customEndpoint = $uri[4];
}

if (isset($uri[5])) {
	$customEndpoint = $uri[5];
}

$data = [];
$requestMethod = $_SERVER["REQUEST_METHOD"];

if (in_array($requestMethod, ["PUT", "PATCH"])) {
	$input = urldecode(file_get_contents("php://input", false, stream_context_get_default(), 0, $_SERVER["CONTENT_LENGTH"]));
	parse_str($input, $data);
}

$controller = $controllerClass->newInstance($requestMethod, $data, $id, $customEndpoint);
$controller->processRequest();