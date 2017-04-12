<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель новостей</title>
</head>
<body>

    <h1 style="text-align: center;">Админ-панель новостей</h1>
    <hr>
    <h2>Админ-панель новостей :: добавление</h2>
    <p style="margin-left: 40px;"><a href="/admin/news/all">Админ-панель новостей</a></p>
    <h3>Добавить новость:</h3>

    <?php if (isset($errors)): ?>
        <?php foreach ($errors as $error): ?>
            <p style="margin-left: 40px; color: red;"><?php echo $error->getMessage(); ?></p>
        <?php endforeach; ?>
    <?php endif; ?>

    <form style="margin-left: 40px;" action="/admin/news/save" method="post">
        <label for="author">
            Автор новости:
            <br>
            <select style="width: 415px;" id="author" name="author_id">
                <?php foreach ($authors as $author): ?>
                    <option value="<?php echo $author->id; ?>"><?php echo $author->name; ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <br>
        <br>
        <label for="title">
            Заголовок новости:
            <br>
            <input style="width: 415px;" type="text" name="title" id="title" value="<?php if (isset($article)) { echo $article->title; } ?>">
        </label>
        <br>
        <br>
        <label for="lead">
            Содержимое новости:
            <br>
            <textarea name="lead" id="lead" cols="50" rows="10"><?php if (isset($article)) { echo $article->lead; } ?></textarea>
        </label>
        <br>
        <br>
        <input type="submit" value="Добавить">
    </form>

</body>
</html>