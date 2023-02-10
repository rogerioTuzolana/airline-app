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
        Schema::create('tariff_airline_tickets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tariff_id')->unsigned();
            $table->bigInteger('airline_id')->unsigned();
            $table->integer('n_ticket')->unsigned();

            $table->foreign('tariff_id')
            ->references('id')
            ->on('tariffs')
            ->onDelete('cascade');

            $table->foreign('airline_id')
            ->references('id')
            ->on('airlines')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tariff_airline_tickets');
    }
};
