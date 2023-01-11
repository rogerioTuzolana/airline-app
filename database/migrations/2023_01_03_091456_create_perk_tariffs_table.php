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
        Schema::create('perk_tariffs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tariff_id')->unsigned();
            $table->bigInteger('perk_id')->unsigned();
            $table->text('description');
            $table->double('amount',10,2)->nullable();
            $table->timestamps();

            $table->foreign('tariff_id')
            ->references('id')
            ->on('tariffs')
            ->onDelete('cascade');

            $table->foreign('perk_id')
            ->references('id')
            ->on('perks')
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
        Schema::dropIfExists('perk_tariffs');
    }
};
