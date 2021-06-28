<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name');
            $table->string('real_name');
            $table->string('cnpj')->nullable();
            $table->string('email');
            $table->string('avatar')->nullable();
            $table->string('owner');
            $table->string('municipal_registration')->nullable();
            $table->string('state_registration')->nullable();

            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
