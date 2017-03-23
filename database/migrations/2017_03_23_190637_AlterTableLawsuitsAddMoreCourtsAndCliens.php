<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableLawsuitsAddMoreCourtsAndCliens extends Migration
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
            $table->string('more_clients', 255)->after('older_client')->nullable();
            $table->string('more_opponents', 255)->after('older_opponent')->nullable();
            $table->string('more_courts', 255)->after('older_court')->nullable();
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
            $table->dropColumn('more_clients');
            $table->dropColumn('more_opponents');
            $table->dropColumn('more_courts');
        });

    }
}
