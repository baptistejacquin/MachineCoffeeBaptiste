<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recettes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('boisson_id')->unsigned();
            $table->integer('ingredient_id')->unsigned();
            $table->integer('quantite');
            $table->timestamps();


        });
        Schema::enableForeignKeyConstraints();
        Schema::table('recettes', function (Blueprint $table){

            $table->foreign('ingredient_id')
                ->references('id')->on('ingredients')->onDelete('cascade');
            $table->foreign('boisson_id')
                ->references('id')->on('boissons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recettes');
        Schema::disableForeignKeyConstraints();
    }
}
