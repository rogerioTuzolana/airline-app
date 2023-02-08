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
        Schema::create('buy_tickets', function (Blueprint $table) {
            $table->id();

            $table->text('reference_code');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('tariff_id')->unsigned();
            $table->bigInteger('airline_id')->unsigned();
            $table->integer('n_ticket')->unsigned();
            $table->string('type');
            
            $table->string('payer_id')->nullable();
            $table->string('payer_email')->nullable();
            $table->enum('method', ['ref', 'paypal']);
            $table->double('amount',10,2);
            $table->string('currency')->nullable();
            $table->string('status');
            $table->boolean('status_validate')->default(true);

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

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
        Schema::dropIfExists('buy_tickets');
    }
};
