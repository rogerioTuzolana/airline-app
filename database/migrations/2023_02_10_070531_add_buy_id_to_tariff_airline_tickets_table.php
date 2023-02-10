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
        Schema::table('tariff_airline_tickets', function (Blueprint $table) {
            //
            $table->foreignId('buy_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tariff_airline_tickets', function (Blueprint $table) {
            //
            $table->foreign('buy_id')
            ->constrained()
            ->onDelete('cascade');
        });
    }
};
