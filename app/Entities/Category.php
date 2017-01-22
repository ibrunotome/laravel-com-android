<?php

namespace SON\Entities;

use HipsterJazzbo\Landlord\BelongsToTenants;
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
    use BelongsToTenants;

    protected $fillable = [
        'name'
    ];

}
