<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ошибка</title>
</head>
<body>
    <h1 style="text-align: center;">Новостной сайт</h1>
    <p><a href="/">Главная</a></p>
    <hr>
    <p>К сожалению, произошла ошибка.</p>
    <p>СООБЩЕНИЕ ОШИБКИ: <?php echo $ex->getMessage(); ?></p>
</body>
</html>