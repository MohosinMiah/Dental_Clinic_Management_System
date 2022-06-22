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
			$table->string('heart_disease')->nullable();
			$table->string('high_blood')->nullable();
			$table->string('diabetic')->nullable();
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
