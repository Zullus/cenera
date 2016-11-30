<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeProcesseNumberPromotorToLawsuits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lawsuits', function ($table) {
            $table->string('type')->after('id')->references('id')->on('types');
            $table->string('process_number')->after('type');
            $table->string('attorney')->after('offense')->references('id')->on('persons');//Procurador
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lawsuits', function ($table) {
            $table->dropColumn('type');
            $table->dropColumn('process_number');
            $table->dropColumn('attorney');//Procurador
        });
    }
}
