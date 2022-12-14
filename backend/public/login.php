<?php



require '../vendor/autoload.php';

use app\database\Connection;
use Firebase\JWT\JWT;

header("Access-Control-Allow-Origin: *");

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__, 2));
$dotenv->load();

$email = filter_input(INPUT_POST, 'email');
$passwrd = filter_input(INPUT_POST, 'passwrd');


$pdo = Connection::connect();

$prepare = $pdo->prepare("select * from users where email = :email");
$prepare->execute([
  'email' => $email
]);

$userFound = $prepare->fetch();

if(!$userFound){
  http_response_code(401);
}

if(!password_verify($passwrd, $userFound->passwrd)){
  http_response_code(401);
}

$payload = [
  "exp" => time() + 50,
  "iat" => time(),
  "email" => $email
];

$encode = JWT::encode($payload, $_ENV['KEY'],'HS256');

echo json_encode($encode);