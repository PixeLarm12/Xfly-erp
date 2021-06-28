<?php

namespace App\Xfly\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'id';

    protected $dateFormat = 'Y-m-d';

    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = [
        'price',
        'description',
        'buyer',
        'seller',
        'qtde',
        'item',
        'purchase_date',
    ];
}
