<?php

require '../vendor/autoload.php';

use app\database\Connection;

header("Access-Control-Allow-Origin: *");

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$passwrd = filter_input(INPUT_POST, 'passwrd', FILTER_SANITIZE_STRING);


$pdo = Connection::connect();

$prepare = $pdo->prepare("select * from users where email = :email");
$prepare->execute([
  'email' => $email
]);

$userFound = $prepare->fetch();

echo json_encode($userFound);