<?php

namespace App\Xfly\Model;

use Illuminate\Database\Eloquent\Model;

class Drone extends Model
{
    protected $dateFormat = 'Y-m-d';

    protected $fillable = [
        'model',
        'key',
        'status',
        'description',
        'production_date',
        'purchase_date',
        'company_id',
    ];
}
