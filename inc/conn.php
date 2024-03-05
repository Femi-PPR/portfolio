<?php
require_once realpath(__DIR__ . "/../vendor/autoload.php");
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(realpath(__DIR__ . "/../"));
$dotenv->load();

try {
    $db = new PDO("mysql:host=" . $_ENV["DB_HOST"] . ";dbname=" . $_ENV["DB_NAME"], $_ENV["DB_USER_NAME"], $_ENV["DB_PASSWORD"]);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $alertMsgs = [
        [
            'type' => 'error',
            'msg' => $e->getMessage(),
        ]
    ];
}
