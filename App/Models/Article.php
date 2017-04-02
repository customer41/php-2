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

    protected const TABLE = 'news';

    public $title;
    public $lead;
    public $author_id;

    public function __get($name)
    {
        if ('author' == $name && !empty($this->author_id)) {
            return Author::findById($this->author_id);
        }
        return null;
    }

}