<?php

namespace App\Classes;

abstract class Controller
{

    protected $view;

    public function __construct()
    {
        $this->view = new View;
    }

    public function action($action)
    {
        if ($this->access($action)) {
            $action = 'action' . $action;
            $this->$action();
        } else {
            die('Access denied!');
        }
    }

    protected function access($action)
    {
        return true;
    }

}