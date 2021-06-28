<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('description')->nullable();
            $table->string('buyer');
            $table->string('seller');
            $table->string('qtde');
            $table->string('price');
            $table->string('item');
            $table->date('purchase_date');

            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
