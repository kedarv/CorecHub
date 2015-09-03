<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exercise', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 45)->nullable();
			$table->integer('category');
			$table->integer('type');
			$table->text('bb_link')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exercise');
	}

}