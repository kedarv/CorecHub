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
            $table->integer('checkinid');
            $table->integer('exerciseid');
            $table->integer('weight');
            $table->integer('reps');

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
