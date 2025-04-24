<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'includes/db.php';
$result = pg_query($db_conn, "SELECT * FROM articles ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Статьи</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <div class="articles-header">
            <h1>Все статьи</h1>
            <a href="/pages/add_article.php" class="add-article-button">+ Добавить статью</a>
        </div>

        <div class="articles-list">
            <?php while ($row = pg_fetch_assoc($result)): ?>
                <div class="article-card">
                    <h2><?= htmlspecialchars($row['title']) ?></h2>
                    <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
                    <small>Опубликовано: <?= date("d.m.Y H:i", strtotime($row['created_at'])) ?></small>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>

