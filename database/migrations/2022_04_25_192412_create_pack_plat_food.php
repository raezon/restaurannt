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
            $table->foreignId('pack_id')->constrained()->onDelete('cascade');
            $table->foreignId('plat_id')->constrained()->onDelete('cascade');
            $table->foreignId('food_id')->constrained()->onDelete('cascade');
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
