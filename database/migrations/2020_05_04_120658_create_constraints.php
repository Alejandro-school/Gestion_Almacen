<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products_providers', function (Blueprint $table) {
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('id_provider')->references('id')->on('providers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('constraints', function (Blueprint $table) {
            //
        });
    }
}
