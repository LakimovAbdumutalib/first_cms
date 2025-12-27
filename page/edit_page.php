<?php
session_start();
require_once '../db/db.php';


if (!isset($_SESSION['user_id'])) {
    header('Location: log_reg/login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$page_id = $_GET['id'] ?? null;

if (!$page_id) {
    header('Location: index.php');
    exit;
}


try {
    // Проверяем, что страница существует и принадлежит именно этому юзеру
    $stmt = $db->prepare("SELECT * FROM pages WHERE id = ? AND user_id = ?");
    $stmt->execute([$page_id, $user_id]);
    $page = $stmt->fetch();

    if (!$page) {
        die("Страница не найдена или у вас нет прав на её редактирование.");
    }
} catch (PDOException $e) {
    die("Ошибка БД: " . $e->getMessage());
}

// 3. ОБРАБОТКА СОХРАНЕНИЯ (если форма была отправлена)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_title = trim($_POST['title']);
    $new_content = trim($_POST['content']);

    try {
        $updateStmt = $db->prepare("UPDATE pages SET title = ?, content = ? WHERE id = ? AND user_id = ?");
        $updateStmt->execute([$new_title, $new_content, $page_id, $user_id]);

        header('Location:/cms/index.php');
        exit;
    } catch (PDOException $e) {
        die("Ошибка при обновлении: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Редактирование страницы</title>
</head>

<body>
    <h2>Редактировать: <?php echo htmlspecialchars($page['title']); ?></h2>

    <form method="POST">
        <div>
            <label>Заголовок:</label><br>
            <input type="text" name="title" value="<?php echo htmlspecialchars($page['title']); ?>" required>
        </div>
        <br>
        <div>
            <label>Текст:</label><br>
            <textarea name="content" rows="10" cols="50"
                required><?php echo htmlspecialchars($page['content']); ?></textarea>
        </div>
        <br>
        <button type="submit">Сохранить изменения</button>
        <a href="/cms/index.php">Отмена</a>
    </form>
</body>

</html>