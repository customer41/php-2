<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель сайта</title>
</head>
<body>

    <h1 style="text-align: center;">Админ-панель сайта</h1>
    <p><a href="/index.php">Главная страница сайта</a></p>
    <hr>
    <h2>Админ-панель новостей</h2>
    <p style="margin-left: 40px;"><a href="/add.php">Добавить новость</a></p>
    <h3>Список новостей:</h3>

    <?php if (empty($data)): ?>
        <p>Нет новостей для администрирования</p>
    <?php else: ?>
        <ul>
            <?php foreach ($data as $article): ?>
                <li style="border-top: 1px solid black; list-style-type: none;">
                    <article>
                        <header>
                            <h3><?php echo $article->title; ?></h3>
                        </header>
                        <p><?php echo $article->lead; ?></p>
                        <footer>
                            <p>
                                <a href="/edit.php?id=<?php echo $article->id; ?>">Редактировать новость</a> |
                                <a href="/delete.php?id=<?php echo $article->id; ?>">Удалить новость</a>
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