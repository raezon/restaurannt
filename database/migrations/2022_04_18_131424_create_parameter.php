<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParameter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameter', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("owner_name");
            $table->string("email");
            $table->string("phone");
            $table->string("location");
            $table->string("apear_phone");
            $table->string("apear_email");
            $table->json('option')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parameter');
    }
}
