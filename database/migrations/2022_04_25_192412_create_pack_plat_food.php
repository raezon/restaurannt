<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackPlatFood extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pack_plat_food', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pack_id')->unsigned()->index()->nullable();
            $table->foreign('pack_id')->references('id')->on('packs')->onDelete('cascade');
            $table->bigInteger('plat_id')->unsigned()->index()->nullable();
            $table->foreign('plat_id')->references('id')->on('plats')->onDelete('cascade');
            $table->bigInteger('food_id')->unsigned()->index()->nullable();
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
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
        Schema::dropIfExists('pack_plat_food');
    }
}
