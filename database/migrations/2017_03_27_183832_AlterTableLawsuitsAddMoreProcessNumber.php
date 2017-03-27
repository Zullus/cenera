<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableLawsuitsAddMoreProcessNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lawsuits', function(Blueprint $table)
        {
            $table->string('more_process_number', 255)->after('process_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lawsuits', function(Blueprint $table)
        {
            $table->dropColumn('more_process_number');
        });
    }
}
