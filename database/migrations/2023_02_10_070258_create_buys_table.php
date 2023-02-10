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
        Schema::create('buys', function (Blueprint $table) {
            $table->id();
            $table->text('reference_code');
            $table->bigInteger('user_id')->unsigned();
            
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
        Schema::dropIfExists('buys');
    }
};
