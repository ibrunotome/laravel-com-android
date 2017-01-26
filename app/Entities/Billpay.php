<?php

namespace SON\Entities;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Billpay extends Model implements Transformable
{
    use TransformableTrait;
    use BelongsToTenants;

    protected $fillable = [
        'name',
        'date_due',
        'value',
        'done',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
