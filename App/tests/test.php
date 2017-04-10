<?php

$db = new \App\Classes\Db;

$sql = 'INSERT INTO news (title, lead) VALUES (:title, :lead)';
$res = $db->execute($sql, [':title' => 'Какая-то новость', ':lead' => 'Краткое описание этой новости']);

var_dump($res);