<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Новость</title>
</head>
<body>

<h1 style="text-align: center;">Новость</h1>
<p>
    <a href="/">Главная страница сайта</a> |
    <a href="/news/all">Все новости</a> |
    <a href="/adminNews">Админ-панель новостей</a>
</p>
<hr>

<article>
    <header>
        <h2><?php echo $article->title; ?></h2>
    </header>
    <p><?php echo $article->lead; ?></p>
    <footer>
        <small>Автор: <?php echo $article->author->name; ?></small>
    </footer>
</article>

<hr>
</body>
</html>