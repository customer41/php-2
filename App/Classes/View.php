<?php

namespace App\Classes;

class View
    implements \Countable, \Iterator
{

    use TGetSet;

    const PATH = __DIR__ . '/../../templates/';

    public function render($template)
    {
        foreach($this->data as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include self::PATH . $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display($template)
    {
        echo $this->render($template);
    }


    public function count()
    {
        return count($this->data);
    }

    public function current()
    {
        return current($this->data);
    }


    public function next()
    {
        next($this->data);
    }


    public function key()
    {
        return key($this->data);
    }


    public function valid()
    {
        return isset($this->data[$this->key()]);
    }


    public function rewind()
    {
        reset($this->data);
    }
}