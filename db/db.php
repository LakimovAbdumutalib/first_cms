<?php
$host = 'localhost';
$db_name = 'cms_db';
$user = 'root';
$pass = 'root';


$db = null; 

try {
    $db = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Ошибка подключения к БД: " . $e->getMessage());
}