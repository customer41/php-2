<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель новостей</title>
</head>
<body>

    <h1 style="text-align: center;">Админ-панель новостей</h1>
    <p><a href="/">Главная страница сайта</a></p>
    <hr>
    <h2>Админ-панель новостей :: главная</h2>
    <p style="margin-left: 40px;"><a href="/admin/news/add">Добавить новость</a></p>
    <h3>Список новостей:</h3>

    <?php if (empty($news)): ?>
        <p>Нет новостей для администрирования</p>
    <?php else: ?>
        <ul>
            <?php foreach ($news as $article): ?>
                <li style="border-top: 1px solid black; list-style-type: none;">
                    <article>
                        <header>
                            <h3><?php echo $article->title; ?></h3>
                        </header>
                        <p><?php echo $article->lead; ?></p>
                        <footer>
                            <small>Автор: <?php echo $article->author->name; ?></small>
                            <p>
                                <a href="/admin/news/edit/?id=<?php echo $article->id; ?>">Редактировать новость</a> |
                                <a href="/admin/news/delete/?id=<?php echo $article->id; ?>">Удалить новость</a>
                            </p>
                        </footer>

                    </article>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <hr>
</body>
</html>