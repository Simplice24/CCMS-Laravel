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
        Schema::create('cooperative_administrations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cooperative_id')->unsigned();
            $table->bigInteger('administration_id')->unsigned();
            $table->timestamps();
            $table->foreign('cooperative_id')->references('id')->on('cooperatives')->onDelete('cascade');
            $table->foreign('administration_id')->references('id')->on('administrations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cooperative_administrations');
    }
};
