<?php

namespace App\Xfly\Model;

use Illuminate\Database\Eloquent\Model;

class Notifier extends Model
{
    protected $fillable = [
        'description',
        'drone_id',
        'product_id',
        'company_id',
    ];
}
