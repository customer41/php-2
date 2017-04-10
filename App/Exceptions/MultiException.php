<?php

namespace App\Exceptions;

class MultiException
    extends \Exception
    implements \Countable
{

    protected $data = [];

    public function add(\Exception $ex)
    {
        $this->data[] = $ex;
    }

    public function getErrors()
    {
        return $this->data;
    }

    public function count()
    {
        return count($this->data);
    }
}