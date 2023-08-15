<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/php-mongodb/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT'] . "/php-mongodb");
$dotenv->load();

try {
    $m = new MongoDB\Client($_ENV['MONGODB_URI']);
    $database = $m->db1;
} catch (Exception $e) {
    echo $e;
}
