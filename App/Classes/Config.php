<?php

namespace App\Classes;

class Config
{

    use TSingleton;

    protected $data;

    protected function __construct()
    {
        $this->data = require __DIR__ . '/../../configDb.php';
    }

    public function getDriver()
    {
        return $this->data['driver'];
    }

    public function getHost()
    {
        return $this->data['db']['host'];
    }

    public function getDbName()
    {
        return $this->data['db']['name'];
    }

    public function getUser()
    {
        return $this->data['db']['user'];
    }

    public function getPass()
    {
        return $this->data['db']['pass'];
    }

    public function getDsn()
    {
        return $this->getDriver() . ':host=' . $this->getHost() . ';dbname=' . $this->getDbName();
    }

}