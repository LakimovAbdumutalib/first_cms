<?php
session_start();


if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $username = trim($_POST["username"]);  
    
   $db = new PDO("mysql:host=localhost;dbname=cms_db;charset=utf8mb4", "root", "root", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    $checkSql = "SELECT COUNT(*) FROM users WHERE username = ?";
    $checkStmt = $db->prepare($checkSql);
    $checkStmt->execute([$username]);

    if ($checkStmt->fetchColumn() > 0) {
        echo "Имя пользователя уже занято.";
        exit; 
    }


    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password, created_at) VALUES (?, ?, NOW())";
    $stmt = $db->prepare($sql);
    if ($stmt->execute([$username, $password])) {

        $new_user_id = $db->lastInsertId(); 
        $_SESSION['user_id'] = $new_user_id;

        header('Location:../new_pages/add_page.php');


    }

}


?>