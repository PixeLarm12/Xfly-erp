<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Xfly\Model\Payment;
use App\Xfly\Model\Company;
use App\Xfly\Model\User;
use App\Xfly\Model\Service;
use App\Xfly\Model\Product;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        Company::creating(function ($model) {
            $model->id = \Str::uuid();
        });

        User::creating(function ($model) {
            $model->id = \Str::uuid();
        });

        Payment::creating(function ($model) {
            $model->id = \Str::uuid();
        });

        Service::creating(function ($model) {
            $model->id = \Str::uuid();
        });

        Product::creating(function ($model) {
            $model->id = \Str::uuid();
        });
    }
}
