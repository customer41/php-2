<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Новость</title>
</head>
<body>

<p><a href="/index.php">На главную</a></p>

<?php if (false == $article): ?>
    <p>Запрашиваемая новость не найдена</p>
<?php else: ?>
    <article>
        <header>
            <h2><?php echo $article->title; ?></h2>
        </header>
        <p><?php echo $article->lead; ?></p>
    </article>
<?php endif; ?>

</body>
</html>