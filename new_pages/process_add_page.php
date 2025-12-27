<?php
    session_start();

    require_once '../db/db.php';
    
  if (!isset($_SESSION['user_id'])) {
    die("Доступ запрещен!");
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $title= trim($_POST['title']);
    $content= trim($_POST['content']);
    $user_id= $_SESSION['user_id']; 
        try {
            $sql = "INSERT INTO pages (user_id, title, content, created_at) VALUES (?, ?, ?, now())";
             
      $stmt = $db->prepare($sql);
        
        if ($stmt->execute([$user_id, $title, $content])) {
            
            header('Location: ../index.php');
            exit;
        }
    } catch (PDOException $e) {
        die("Ошибка при сохранении: " . $e->getMessage());
    }
}

    echo"file to add page";
    




?>