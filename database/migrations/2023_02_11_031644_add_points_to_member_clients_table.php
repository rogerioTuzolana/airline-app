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
        Schema::table('member_clients', function (Blueprint $table) {
            //
            $table->double('points',10,2)->default(0)->after('preferred_language');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('member_clients', function (Blueprint $table) {
            //
            $table->dropColumn('points');
        });
    }
};
