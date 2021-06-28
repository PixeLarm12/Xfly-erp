<?php

namespace App\Xfly\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    protected $dateFormat = 'Y-m-d';

    protected $primaryKey = 'id';

    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = [
        'id',
        'model',
        'image',
        'price',
        'description',
        'company_id',
    ];
}
