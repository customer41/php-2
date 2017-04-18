<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель авторов</title>
    <style>
        h1 {
            text-align: center;
        }
        table, td, th {
            border: 1px solid black;
        }
        table {
            border-collapse: collapse;
        }
    </style>
</head>
<body>

<h1>Админ-панель авторов</h1>
<p><a href="/">Главная страница сайта</a></p>
<hr>
<h2>Админ-панель авторов :: таблица авторов</h2>

<table>
    <tr>
        <?php foreach ($columns as $column): ?>
            <th><?php echo $column; ?></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($models as $author): ?>
        <tr>
            <?php foreach ($functions as $function): ?>
                <td><?php echo $function($author); ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>

<hr>
</body>
</html>