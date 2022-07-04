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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('patient_phone');
			$table->string('date');
            $table->string('name');
			$table->string('gender')->nullable();
            $table->string('email')->nullable();
			$table->integer('doctor_id');
            $table->integer('patient_id')->nullable();
            $table->string('note')->nullable();
            $table->string('isRegistered')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('appointments');
    }
};
