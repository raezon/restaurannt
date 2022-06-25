<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalPriceOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function ($table) {
            $table->id();
            $table->integer('platQuantity');
            $table->integer('foodQuantity');
            $table->integer('packQuantity');
            $table->integer('totalQuantity');
            $table->float('platPrice');
            $table->float('foodPrice');
            $table->float('packPrice');
            $table->float('totalPrice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function ($table) {
            $table->integer('platQuantity');
            $table->integer('foodQuantity');
            $table->integer('packQuantity');
            $table->integer('totalQuantity');
            $table->float('platPrice');
            $table->float('foodPrice');
            $table->float('packPrice');
            $table->float('totalPrice');
        });
    }
}
