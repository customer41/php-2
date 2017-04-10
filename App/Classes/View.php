<?php

namespace App\Classes;

class View
    implements \Countable, \Iterator
{

    use TGetSet;

    public function render($template)
    {
        ob_start();
        foreach($this as $key => $value) {
            $$key = $value;
        }
        include $template;
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
        return null !== key($this->data);
    }


    public function rewind()
    {
        reset($this->data);
    }
}