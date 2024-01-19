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
        Schema::create('admitted', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pateint_id');
            $table->foreign('pateint_id')->references('id')->on('patients');
            $table->string('Disease');
            $table->string('BillPayment');

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
        Schema::dropIfExists('admitted');
    }
};
