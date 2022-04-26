<?php

use App\Models\Food;
use App\Models\Pack;
use App\Models\Plat;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pack_id')->unsigned()->index()->nullable();
            $table->bigInteger('plat_id')->unsigned()->index()->nullable();
            $table->bigInteger('food_id')->unsigned()->index()->nullable();
            $table->foreign('pack_id')->references('id')->on('packs')->onDelete('cascade');
            $table->foreign('plat_id')->references('id')->on('plats')->onDelete('cascade');
            $table->foreign('food_id')->references('id')->on('food')->onDelete('cascade');
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
        Schema::dropIfExists('order');
    }
}
