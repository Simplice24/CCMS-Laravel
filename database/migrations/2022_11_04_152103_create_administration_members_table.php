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
        Schema::create('administration_members', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('administration_id')->unsigned();
            $table->bigInteger('member_id')->unsigned();
            $table->timestamps();
            $table->foreign('administration_id')->references('id')->on('administrations')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administration_members');
    }
};
