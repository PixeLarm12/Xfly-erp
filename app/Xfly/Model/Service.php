<?php

namespace App\Xfly\Model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'id';

    protected $dateFormat = 'Y-m-d';

    protected $casts = [
        'id' => 'string',
    ];
    protected $fillable = [
        'id',
        'seller',
        'client',
        'price',
        'image',
        'param',
        'delivery_date',
        'purchase_date',
        'service',
        'description',
        'observation',
        'company_id',
        'drone_id',
        'product_id',
    ];
}
