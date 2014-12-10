<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table)
        {
            $table->string('firstname', 255);
            $table->string('lastname', 255);
            $table->text('puid');
			$table->softDeletes();
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
			$table->dropColumn('puid');
        });
    }

}
