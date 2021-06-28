<?php

namespace App\Xfly\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;

class User extends Authenticable
{
    use SoftDeletes;

    public $incrementing = false;

    protected $primaryKey = 'id';

    protected $dateFormat = 'Y-m-d';

    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = [
        'id',
        'name',
        'email',
        'token',
        'password',
        'financial',
    ];
}
