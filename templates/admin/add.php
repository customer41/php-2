<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель сайта</title>
</head>
<body>

    <h1 style="text-align: center;">Админ-панель сайта</h1>
    <hr>
    <h2>Админ-панель новостей :: добавление</h2>
    <p style="margin-left: 40px;"><a href="/admin.php">Админ-панель</a></p>
    <h3>Добавить новость:</h3>

    <?php if (isset($error)): ?>
        <p style="margin-left: 40px; color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form style="margin-left: 40px;" action="/add.php" method="post">
        <label for="title">
            Заголовок новости:
            <br>
            <input style="width: 400px;" type="text" name="title" id="title" value="<?php echo $title; ?>">
        </label>
        <br>
        <br>
        <label for="lead">
            Содержимое новости:
            <br>
            <textarea name="lead" id="lead" cols="50" rows="10"><?php echo $lead; ?></textarea>
        </label>
        <br>
        <br>
        <input type="submit" value="Добавить">
    </form>

</body>
</html>