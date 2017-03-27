<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableLawsuitsAddMoreProcess extends Migration
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
            $table->string('more_process', 255)->after('process')->nullable();
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
            $table->dropColumn('more_process');
        });
    }
}
