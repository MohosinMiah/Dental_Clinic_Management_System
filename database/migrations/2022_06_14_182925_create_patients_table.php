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
		Schema::create('patients', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('phone');
			$table->integer('age');
			$table->string('gender');
			$table->string('email')->nullable();
			$table->string('blood_group')->nullable();
			$table->string('address')->nullable();

			$table->string('db')->nullable();
			$table->string('htn')->nullable();
			$table->string('cardiac_disease')->nullable();
			$table->string('renal_disease')->nullable();
			$table->string('hepatitis')->nullable();
			$table->string('asthma')->nullable();
			$table->string('rheumatic_fever')->nullable();
			$table->string('bleeding_disorder')->nullable();
			$table->string('drug_allergy')->nullable();
			$table->string('pregnant_women')->nullable();
			$table->string('lactating_mother')->nullable();

			$table->string('note')->nullable();

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
		Schema::dropIfExists('patients');
	}
	};
