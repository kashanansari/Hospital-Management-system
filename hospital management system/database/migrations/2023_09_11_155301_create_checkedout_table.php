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
        Schema::create('checkedout', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pateint_id');
            $table->foreign('pateint_id')->references('id')->on('admitted');
            $table->string('Bill');
            // $table->foreign('Bill')->references('id')->on('admitted');
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
        Schema::dropIfExists('checkedout');
    }
};
