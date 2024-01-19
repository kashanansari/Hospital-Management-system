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
        Schema::create('_i_c_u', function (Blueprint $table) {
            $table->id();
            $table->text('Pateint_name');
            $table->integer('Days');
            $table->text('Pateint_status');
            $table->unsignedBigInteger('admit_id');
            $table->foreign('admit_id')->references('id')->on('admitted');
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
        Schema::dropIfExists('_i_c_u');
    }
};
