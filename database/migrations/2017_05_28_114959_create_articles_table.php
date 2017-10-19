<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('alias');
            $table->text('summary')->nullable();
            $table->longText('content');
            $table->string('image');
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->tinyInteger('featured');
            $table->integer('views')->default(0);
            $table->integer('idTypeCate')->unsigned();
            $table->foreign('idTypeCate')->references('id')->on('type_categories')->onDeletes('cascade');
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
        Schema::dropIfExists('articles');
    }
}
