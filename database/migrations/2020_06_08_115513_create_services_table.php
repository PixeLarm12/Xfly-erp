<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('seller');
            $table->string('price');
            $table->string('image')->nullable();
            $table->string('param')->nullable();
            $table->date('delivery_date');
            $table->date('purchase_date');
            $table->string('service');
            $table->string('description')->nullable();
            $table->string('observation')->nullable();
            $table->string('company_id')

                    ->foreign('company_id')
                    ->nullable()
                    ->references('id')
                    ->on('companies')
                    ->onDelete('cascade');

            $table->bigInteger('drone_id')

                    ->foreign('drone_id')
                    ->nullable()
                    ->references('id')
                    ->on('drones');

            $table->string('product_id')

                    ->foreign('product_id')
                    ->nullable()
                    ->references('id')
                    ->on('products');

            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}
