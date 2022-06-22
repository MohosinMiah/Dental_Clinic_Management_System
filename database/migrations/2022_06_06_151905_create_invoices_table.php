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
        Schema::create('invoices', function (Blueprint $table) {
           
            $table->id();
            
            $table->string('patient_id');
            $table->integer('doctor_id')->nullable();
            $table->integer('added_by_id')->nullable();

            $table->string('patient_phone');
            $table->string('patient_name');
            $table->text('patient_address')->nullable();

            $table->string('payment_date');

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
        Schema::dropIfExists('invoices');
    }
};
