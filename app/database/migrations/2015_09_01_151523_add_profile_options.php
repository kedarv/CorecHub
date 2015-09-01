<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfileOptions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table)
        {
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('gender');
            $table->float('height');
            $table->float('weight');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
        {
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('gender');
            $table->dropColumn('height');
            $table->dropColumn('weight');
        });
	}

}
