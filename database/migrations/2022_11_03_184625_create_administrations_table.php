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
        Schema::create('administrations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->string('role');
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->integer('phone');
            $table->string('province');
            $table->string('district');
            $table->string('sector');
            $table->string('cell');
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
        Schema::dropIfExists('administrations');
    }
};
