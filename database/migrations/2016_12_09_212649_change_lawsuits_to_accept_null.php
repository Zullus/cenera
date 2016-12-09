<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeLawsuitsToAcceptNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lawsuits', function ($table) {
            $table->string('process_number')->nullable()->change();
            $table->string('client')->nullable()->change();
            $table->string('opponent')->nullable()->change();
            $table->string('responsable')->nullable()->change();
            $table->string('court')->nullable()->change();
            $table->string('process')->nullable()->change();
            $table->string('attorney')->nullable()->change();
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
