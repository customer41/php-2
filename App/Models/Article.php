<?php

namespace App\Models;

use App\Classes\Model;

/**
 * Class Article
 * @package App\Models
 *
 * @property Author $author
 * @property int $id
 * @property string $title
 * @property string $lead
 * @property int $author_id
 */
class Article
    extends Model
{

    protected const TABLE = 'News';

    public $title;
    public $lead;
    protected $author_id;

    public function __get($name)
    {
        if ('author' == $name && !empty($this->author_id)) {
            return Author::findById($this->author_id);
        }
        return null;
    }

    public function __set($name, $value)
    {
        if ('author' == $name && $value instanceof Author) {
            $this->author_id = $value->id;
        }
    }

    public function __isset($name)
    {
        if ('author' == $name) {
            return isset($this->author_id);
        }
        return false;
    }

}