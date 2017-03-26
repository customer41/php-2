<?php

namespace App\Classes;

trait TSingleton
{

    protected static $instance = null;

    protected function __construct()
    {
    }

    public static function instance()
    {
        if (null === self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

}