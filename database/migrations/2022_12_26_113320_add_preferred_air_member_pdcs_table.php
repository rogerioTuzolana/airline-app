<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('member_pdcs', function (Blueprint $table) {
            //
            $table->string('preferred_air')->after('preferred_language');
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
        Schema::table('member_pdcs', function (Blueprint $table) {
            //
            $table->dropColumn('preferred_air');
        });
    }
};
