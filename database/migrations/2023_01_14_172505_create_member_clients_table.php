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
        Schema::create('member_clients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_id')->unsigned();
            $table->date('birthDate');
            $table->enum('gender',['m','f']);
            $table->string('address');
            $table->string('preferred_language');
            $table->timestamps();
            $table->foreign('client_id')
            ->references('id')
            ->on('clients')
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
        Schema::dropIfExists('member_clients');
    }
};
