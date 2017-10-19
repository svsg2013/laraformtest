<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('alias');
            $table->integer('price')->default(0);
            $table->text('summary')->nullable();
            $table->longText('content');
            $table->string('image');
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->integer('idCatePro')->unsigned();
            $table->foreign('idCatePro')->references('id')->on('cate_products')->onDeletes('cascade');
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
        Schema::dropIfExists('products');
    }
}
