<?php

if (!isset($_SESSION['user_id'])) {
    echo "Пожалуйста, <a href='log_reg/login.php'>войдите</a>, чтобы увидеть свои страницы.";
    exit;
}

$current_user_id = $_SESSION['user_id'];
$current_username = $_SESSION['username'] ?? 'Пользователь';
try {

    $stmt = $db->prepare("SELECT id, title, content, created_at FROM pages WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->execute([$current_user_id]);
    $my_pages = $stmt->fetchAll();

} catch (PDOException $e) {
    die("Ошибка загрузки данных: " . $e->getMessage());
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/cms/style/content_style.css">
</head>
<body>
  

<div class="user-welcome">
    <h2>Личный кабинет</h2>
    <p>Вы вошли как: <strong><?php echo htmlspecialchars($current_username); ?></strong> (ID:
        <?php echo $current_user_id; ?>)</p>
    <a href="new_pages/add_page.php" class="btn">Создать новую страницу</a>
</div>

<hr>

<div class="my-pages">
    <h3>Мои публикации:</h3>

    <?php if (count($my_pages) > 0): ?>
        <?php foreach ($my_pages as $page): ?>
            <div class="page-item" >
                <h4><?php echo htmlspecialchars($page['title']); ?></h4>
                <p><?php echo nl2br(htmlspecialchars(mb_strimwidth($page['content'], 0, 150, "..."))); ?></p>
                <div style="font-size: 0.8em; color: #666;">
                    Дата создания: <?php echo $page['created_at']; ?>
                </div>
                <div style="margin-top: 5px;">
                    <a href="/cms/page/edit_page.php?id=<?php echo $page['id']; ?>">Редактировать</a> |
                    <a href="/cms/page/delete_page.php?id=<?php echo $page['id']; ?>" 
                    onclick="return confirm('Вы уверены?')">Удалить</a>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>У вас пока нет созданных страниц.</p>
    <?php endif; ?>
</div> 


</body>
</html>