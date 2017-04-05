<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Все новости</title>
</head>
<body>

    <h1 style="text-align: center;">Все новости</h1>
    <p>
        <a href="/">Главная</a> |
        <a href="/adminNews">Админ-панель новостей</a>
    </p>
    <hr>

    <?php if (empty($news)): ?>
        <p>Пока новостей нет!</p>
    <?php else: ?>
        <?php foreach ($news as $article): ?>
            <article>
                <header>
                    <h2><?php echo $article->title; ?></h2>
                </header>
                <p><?php echo $article->lead; ?></p>
                <footer>
                    <small>Автор: <?php echo $article->author->name; ?></small>
                    <p><a href="/news/one/?id=<?php echo $article->id; ?>">Читать далее...</a></p>
                </footer>
            </article>
            <hr>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>