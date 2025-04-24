<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../includes/db.php';

$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = pg_escape_string($_POST['title']);
    $content = pg_escape_string($_POST['content']);

    $result = pg_query_params(
        $db_conn,
        "INSERT INTO articles (title, content) VALUES ($1, $2)",
        [$title, $content]
    );

    if ($result) {
        $success = true;
        header("Location: /articles.php");
        exit;
    } else {
        $error = "Ошибка: " . pg_last_error($db_conn);
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить статью</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main>
        <h1>Добавить статью</h1>

        <?php if ($error): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form action="add_article.php" method="POST" class="article-form">
            <label for="title">Заголовок:</label>
            <input type="text" id="title" name="title" required>

            <label for="content">Содержание:</label>
            <textarea id="content" name="content" rows="10" required></textarea>

            <button type="submit">Опубликовать</button>
        </form>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>
</html>

