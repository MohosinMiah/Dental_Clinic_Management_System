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
        Schema::create('notices', function (Blueprint $table) {

            $table->id();

            $table->string('patient_id');
            $table->text('doctor_id')->nullable();
            $table->text('service_id')->nullable();
            $table->text('added_by_id')->nullable();

            $table->string('patient_phone');
            $table->text('patient_address')->nullable();

            $table->text('payment_date');

			$table->float('total')->default(0);
			$table->float('tax_total')->default(0);
			$table->float('grand_total')->default(0);
			$table->float('paid_amount')->default(0);
			$table->float('due_total')->default(0);


            $table->string('payment_note')->nullable();
            $table->string('payment_method')->default('Cash');
            $table->string('payment_method_note')->nullable();

			// If User Personal Mobile for Bkash, Nagot or Other Mobile Banking Services

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
        Schema::dropIfExists('notices');
    }
};
