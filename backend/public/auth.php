<?php

require '../vendor/autoload.php';

use app\database\Connection;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization, Content-Type, x-xsrf-token, x_csrftoken, Cache-Control, X-Requested-With");

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__, 2));
$dotenv->load();

// $authorization = "teste";
// $authorization = $_SERVER;
// $authorization = $_SERVER["HTTP_AUTHORIZATION"];

$headers = apache_request_headers();

$authorization = $headers['Authorization'];
$token = str_replace('Bearer ', '', $authorization);

$key = $_SERVER['KEY'];

try {
  $decoded = JWT::decode($token, new Key($key, 'H256'));
  echo json_encode($decoded);
} catch (\Throwable $th) {
  echo json_encode($th->getMessage());
}

// echo json_encode($key);
// echo json_encode($token);
// echo json_encode($authorization);

