<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneMobileFaxDocumentToPersons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('persons', function ($table) {
            $table->string('contact')->after('lastname');
            $table->string('document')->after('contact');
            $table->string('adrress')->after('document');
            $table->string('phone')->after('adrress');
            $table->string('mobile')->after('email');
            $table->string('fax')->after('mobile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('persons', function ($table) {
            $table->dropColumn('document');
            $table->dropColumn('adrress');
            $table->dropColumn('phone');
            $table->dropColumn('mobile');
            $table->dropColumn('fax');
        });
    }
}
