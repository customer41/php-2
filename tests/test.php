<?php

require __DIR__ . '/../Classes/Db.php';

$db = new Db;

$sql = 'INSERT INTO news (title, lead) VALUES (:title, :lead)';
$res = $db->execute($sql, [':title' => 'Какая-то новость', ':lead' => 'Краткое описание этой новости']);

var_dump($res);