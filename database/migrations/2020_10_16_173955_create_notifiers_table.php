<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifiersTable extends Migration
{
    public function up()
    {
        Schema::create('notifiers', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('company_id')

                    ->foreign('company_id')
                    ->nullable()
                    ->references('id')
                    ->on('companies');

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

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifiers');
    }
}
