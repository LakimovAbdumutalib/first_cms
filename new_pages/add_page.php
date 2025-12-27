<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: log_reg/login.php');
    exit;
}
require_once '../blocs/header.php'; // Чтобы дизайн был везде одинаковый
?>

<main>
    <h2>Создать новую страницу</h2>
    <form action="process_add_page.php" method="POST">
        <div>
            <label>Заголовок страницы:</label><br>
            <input type="text" name="title" required placeholder="Введите название...">
        </div>
        <br>
        <div>
            <label>Содержание:</label><br>
            <textarea name="content" rows="10" cols="50" required placeholder="Текст страницы..."></textarea>
        </div>
        <br>
        <button type="submit">Опубликовать</button>
    </form>
</main>

<?php require_once '../blocs/footer.php'; ?>