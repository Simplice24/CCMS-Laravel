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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('idn');
            $table->string('cooperative_name');
            $table->string('category');
            $table->string('gender');
            $table->integer('number_of_trees');
            $table->string('fertilizer');
            $table->integer('phone');
            $table->string('province');
            $table->string('district');
            $table->string('sector');
            $table->string('cell');
            $table->unsignedBigInteger('cooperative_id');
            $table->foreign('cooperative_id')->references('id')->on('cooperatives')->onDelete('cascade');
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
        Schema::dropIfExists('members');
    }
};
