<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDronesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model');
            $table->string('key')->nullable();
            $table->date('production_date');
            $table->date('purchase_date');
            $table->string('status')->nullable();
            $table->string('description')->nullable();
            $table->string('company_id')
                        ->foreign('company_id')
                        ->references('id')
                        ->on('companies')
                        ->onDelete('cascade');

            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drones');
    }
}
