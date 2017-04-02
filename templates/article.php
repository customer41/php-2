<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Новость</title>
</head>
<body>

<h1 style="text-align: center;">Новостной сайт</h1>
<p><a href="/index.php">Главная страница сайта</a></p>
<hr>

<?php if (false == $article): ?>
    <p>Запрашиваемая новость не найдена</p>
<?php else: ?>
    <article>
        <header>
            <h2><?php echo $article->title; ?></h2>
        </header>
        <p><?php echo $article->lead; ?></p>
        <footer>
            <small>Автор: <?php echo $article->author->name; ?></small>
        </footer>
    </article>
<?php endif; ?>

<hr>
</body>
</html>