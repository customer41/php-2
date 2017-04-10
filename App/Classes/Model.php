<?php

namespace App\Classes;

abstract class Model
{

    protected const TABLE = null;

    public $id;

    public static function findAll($sort = 'ASC')
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id ' . $sort;
        return $db->query($sql, static::class);
    }

    public static function findFew($limit, $offset, $sort = 'ASC')
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id ' . $sort . ' LIMIT ' . $offset . ', ' . $limit;
        return $db->query($sql, static::class);
    }

    public static function findById($id)
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $data = $db->query($sql, static::class, [':id' => $id]);
        if (!empty($data)) {
            return $data[0];
        }
        return false;
    }

    protected function insert()
    {
        $columns = [];
        $params  = [];
        $data    = [];
        foreach ($this as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $columns[] = $name;
            $params[]  = ':' . $name;
            $data[':' . $name] = $value;
        }
        $sql = 'INSERT INTO ' . static::TABLE . ' 
                (' . implode(', ', $columns) . ') 
                VALUES 
                (' . implode(', ', $params) . ')';
        $db = new Db;
        $res = $db->execute($sql, $data);
        if (true == $res) {
            $this->id = $db->insertId();
        }
    }

    protected function update()
    {
        $props = [];
        $params = [];
        foreach ($this as $name => $value) {
            $params[':' . $name] = $value;
            if ('id' == $name) {
                continue;
            }
            $props[] = $name . '=:' . $name;
        }
        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(', ', $props) . ' WHERE id=:id';
        $db = new Db;
        $db->execute($sql, $params);
    }

    public function save()
    {
        if (empty($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        $db = new Db;
        $db->execute($sql, [':id' => $this->id]);
    }

    public function fill(array $data)
    {
        foreach ($data as $prop => $value) {
            if (property_exists(static::class, $prop)) {
                $this->$prop = $value;
            }
        }
    }

    public function isNew()
    {
        if (empty($this->id)) {
            return true;
        } else {
            return false;
        }
    }

}