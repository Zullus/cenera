<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLawsuits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawsuits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client')->references('id')->on('persons');
            $table->integer('opponent')->references('id')->on('persons');
            $table->integer('responsable')->references('id')->on('persons');
            $table->integer('court')->references('id')->on('courts');
            $table->string('process');
            $table->string('offense');
            $table->timestamps();
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
        Schema::drop('lawsuits');
    }
}
