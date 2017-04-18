<?php

namespace App\Classes;

use App\Exceptions\DbException;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $cfg = Config::instance();
        $this->dbh = new \PDO($cfg->getDsn(), $cfg->getUser(), $cfg->getPass());
        //$this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql, string $class, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        if (false == $res) {
            throw new DbException('Не удалось выполнить запрос к базе данных.');
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function queryEach($sql, string $class, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        if (false == $res) {
            throw new DbException('Не удалось выполнить запрос к базе данных.');
        }
        $sth->setFetchMode(\PDO::FETCH_CLASS, $class);
        while (false !== ($item = $sth->fetch())) {
            yield $item;
        }
    }

    public function execute($query, $params = [])
    {
        $sth = $this->dbh->prepare($query);
        $res = $sth->execute($params);
        if (false == $res) {
            throw new DbException('Не удалось выполнить запрос к базе данных.');
        }
        return $res;
    }

    public function insertId()
    {
        return $this->dbh->lastInsertId();
    }

}