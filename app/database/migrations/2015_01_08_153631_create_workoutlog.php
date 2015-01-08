<?php
use Illuminate\Database\Migrations\Migration;

class CreateWorkoutlog extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Creates the users table
        Schema::create('workoutlog', function ($table) {
            $table->increments('id');
            $table->string('checkinid');
            $table->text('json');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('users');
    }
}
