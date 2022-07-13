<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageFoodPlatPack extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::table('foods', function ($table) {
            $table->string('photo');
        });*/
        Schema::table('plats', function ($table) {
            $table->string('photo');
        });
        Schema::table('packs', function ($table) {
            $table->string('photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('foods', function ($table) {
            $table->string('photo');
        });
        Schema::table('plats', function ($table) {
            $table->string('photo');
        });
        Schema::table('packs', function ($table) {
            $table->string('photo');
        });
    }
}
