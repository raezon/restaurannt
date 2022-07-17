<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToSomeModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('foods', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('plats', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('packs', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('packs_product', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('some_models', function (Blueprint $table) {
            //
        });
    }
}
