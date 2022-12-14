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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('idDevice');
            $table->string('nameDevice');
            $table->string('typeDevice');
            $table->string('ip_address');
            $table->string('username');
            $table->string('password');
            $table->text('service');
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('connect')->default(1);
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
        Schema::dropIfExists('devices');
    }
};
