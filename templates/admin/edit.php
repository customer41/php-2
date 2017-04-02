<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель сайта</title>
</head>
<body>

    <h1 style="text-align: center;">Админ-панель сайта</h1>
    <hr>
    <h2>Админ-панель новостей :: редактирование</h2>
    <p style="margin-left: 40px;"><a href="/admin.php">Админ-панель</a></p>
    <h3>Редактировать новость:</h3>

    <form style="margin-left: 40px;" action="/edit.php?id=<?php echo $article->id; ?>" method="post">
        <label for="author">
            Автор новости:
            <br>
            <input style="width: 415px;" type="text" id="author" value="<?php echo $article->author->name; ?>" disabled>
        </label>
        <br>
        <br>
        <label for="title">
            Заголовок новости:
            <br>
            <input style="width: 415px;" type="text" name="title" id="title" value="<?php echo $article->title; ?>">
        </label>
        <br>
        <br>
        <label for="lead">
            Содержимое новости:
            <br>
            <textarea name="lead" id="lead" cols="50" rows="10"><?php echo $article->lead; ?></textarea>
        </label>
        <br>
        <br>
        <input type="submit" value="Редактировать">
    </form>

</body>
</html>