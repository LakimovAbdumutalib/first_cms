<?php
session_start();

require_once '../db/db.php';


if (!isset($_SESSION['user_id'])) {
    header('Location:/cms/log_reg/login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$page_id = $_GET['id'] ?? null;

if ($page_id) {
    try {
        $stmt = $db->prepare('DELETE FROM pages WHERE id=? AND user_id=?');
        $stmt->execute([$page_id, $user_id]);
    } catch (PDOException $e) {
        die('ошибка уделения: ' . $e->getMessage());
    }
}

header('Location:../index.php');
exit;




?>