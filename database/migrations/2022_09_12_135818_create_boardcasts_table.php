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
        Schema::create('boardcasts', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->integer('id_account');
            $table->string('nameService');
            $table->string('email');
            $table->string('phone');
            $table->integer('status')->default(1);
            $table->integer('source')->default(1);
            $table->string('start_date');
            $table->string('end_date');
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
        Schema::dropIfExists('boardcasts');
    }
};
