<?php

namespace App\Classes;

class AdminDataTable
{

    protected $models;
    protected $functions;

    public function __construct(array $models, array $functions)
    {
        $this->models = $models;
        $this->functions = $functions;
    }

    public function render($template)
    {
        $view = new View;
        $view->models = $this->models;
        $view->functions = $this->functions;
        $view->columns = array_keys($this->functions);
        $view->display($template);
    }

}