<?php

namespace SON\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Category
 *
 * @package SON\Entities
 */
class Category extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name'
    ];

}
