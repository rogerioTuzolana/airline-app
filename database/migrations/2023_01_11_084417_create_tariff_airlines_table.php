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
        Schema::create('tariff_airlines', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tariff_id')->unsigned();
            $table->bigInteger('airline_id')->unsigned();
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('tariff_id')
            ->references('id')
            ->on('tariffs')
            ->onDelete('cascade');

            $table->foreign('airline_id')
            ->references('id')
            ->on('airlines')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tariff_airlines');
    }
};
