<?php

spl_autoload_register(static function (string $class) {
    require_once __DIR__ . '/' . $class . '.php';
});

$connection= 'DB_CONNECTION';
$host= 'DB_HOST';
$port= 'DB_PORT';
$db = 'DB_DATABASE';
$user = 'DB_USER';
$password = 'DB_PASSWORD';

$dsn = "$connection:host=$host;port=$port;dbname=$db;";

$pdo = new PDO(
    $dsn, $user, $password
);

$db = new DB($pdo);
$userRepository = new UserRepository($db);

$app = new App($userRepository);

$app->renderUsers(
    new Request()
);