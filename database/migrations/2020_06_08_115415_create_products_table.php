<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('model');
            $table->string('price');
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->string('company_id')
                        ->foreign('company_id')
                        ->references('id')
                        ->on('companies')
                        ->onDelete('cascade');

            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
