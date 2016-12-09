<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOlderFildsToLawsuits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lawsuits', function ($table) {
            $table->string('older_client')->after('client')->nullable();
            $table->string('older_opponent')->after('opponent')->nullable();
            $table->string('older_responsable')->after('responsable')->nullable();
            $table->string('older_court')->after('court')->nullable();
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
            $table->dropColumn('older_client');
            $table->dropColumn('older_opponent');
            $table->dropColumn('older_responsable');
            $table->dropColumn('older_court');
        });
    }
}
