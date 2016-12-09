<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePerosonsToAcceptNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('persons', function ($table) {
            $table->string('name')->nullable()->change();;
            $table->string('lastname')->nullable()->change();;
            $table->string('email')->nullable()->change();;
            $table->string('contact')->nullable()->change();;
            $table->string('document')->nullable()->change();;
            $table->string('adrress')->nullable()->change();;
            $table->string('phone')->nullable()->change();
            $table->string('mobile')->nullable()->change();;
            $table->string('fax')->nullable()->change();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
