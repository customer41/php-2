<?php

abstract class Model
{
    protected const TABLE = null;

    public $id;

    public static function findAll()
    {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, static::class);
    }

    public static function findFew($limit, $offset, $sort = 'ASC') {
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

}