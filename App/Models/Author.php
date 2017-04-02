<?php

namespace App\Models;

use App\Classes\Model;

/**
 * Class Author
 * @package App\Models
 *
 * @property string $name
 * @property int $id
 */
class Author
    extends Model
{

    protected const TABLE = 'authors';

    public $name;

}