<?php

namespace App\Classes;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $cfg = Config::instance();
        $this->dbh = new \PDO($cfg->getDsn(), $cfg->getUser(), $cfg->getPass());
    }

    public function query($sql, string $class, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        if (true == $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return false;
    }

    public function execute($query, $params = [])
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute($params);
    }

    public function insertId()
    {
        return $this->dbh->lastInsertId();
    }

}