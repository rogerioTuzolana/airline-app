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
        Schema::create('airlines', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('category');
            $table->string('orige');
            $table->string('destiny');
            $table->bigInteger('fleet_id')->unsigned();
            //$table->bigInteger('tariff_id')->unsigned()->nullable();
            $table->date('date');
            $table->time('time');
            $table->boolean('status')->default(0);
            $table->timestamps();

            /*$table->foreign('tariff_id')
            ->references('id')
            ->on('tariffs')
            ->onDelete('cascade');*/

            $table->foreign('fleet_id')
            ->references('id')
            ->on('fleets')
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
        Schema::dropIfExists('airlines');
    }
};
