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
        Schema::create('_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pateint_id');
            $table->foreign('pateint_id')->references('id')->on('patients');
            $table->string('date');
            $table->string('time');
            $table->string('result');
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
        Schema::dropIfExists('_tests');
    }
};
