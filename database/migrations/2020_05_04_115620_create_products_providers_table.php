<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_provider', function (Blueprint $table) {
            $table->integer('id_product')->unsigned();
            $table->integer('id_provider')->unsigned();
            $table->float('price',5,2);

            $table->primary(['id_product', 'id_provider']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products_providers');
        
    }
}
