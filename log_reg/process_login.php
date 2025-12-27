<?php
session_start();

require_once("../db/db.php");   




$username = $_POST["username"];

$password = $_POST["password"];
$hash_pass = password_hash($password, PASSWORD_DEFAULT);


$stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result= $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id']= $user['id'];
        $_SESSION['username']= $username;
         header('Location:../index.php');
        exit;
    } else {
        echo "Ошибка: Неверный пароль.";
    }
} else {
    echo "Ошибка: Пользователь с таким именем не найден.";
}





$stmt->close();
$conn->close();





?>