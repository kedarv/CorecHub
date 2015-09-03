<?php

class ExerciseTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('exercise')->delete();
        Exercise::create(array('id'=> 1, 'name' => 'Overhead Press', 'category' => 1, 'type' => 0, 'bb_link' => 'http://www.bodybuilding.com/exercises/detail/view/name/standing-military-press'));
        Exercise::create(array('id'=> 2, 'name' => 'Seated Dumbbell Press', 'category' => 1, 'type' => 0, 'bb_link' => 'http://www.bodybuilding.com/exercises/detail/view/name/seated-dumbbell-press'));
        Exercise::create(array('id'=> 3, 'name' => 'Lateral Dumbbell Raise', 'category' => 1, 'type' => 0, 'bb_link' => 'http://www.bodybuilding.com/exercises/detail/view/name/side-lateral-raise'));
        Exercise::create(array('id'=> 4, 'name' => 'Front Dumbbell Raise', 'category' => 1, 'type' => 0, 'bb_link' => 'http://www.bodybuilding.com/exercises/detail/view/name/front-dumbbell-raise'));
        Exercise::create(array('id'=> 5, 'name' => 'Push Press', 'category' => 1, 'type' => 0));
        Exercise::create(array('id'=> 6, 'name' => 'Behind The Neck Barbell Press', 'category' => 1, 'type' => 0));
        Exercise::create(array('id'=> 7, 'name' => 'Hammer Strength Shoulder Press', 'category' => 1, 'type' => 0));
        Exercise::create(array('id'=> 8, 'name' => 'Seated Dumbbell Lateral Raise', 'category' => 1, 'type' => 0, 'bb_link' => 'http://www.bodybuilding.com/exercises/detail/view/name/seated-side-lateral-raise'));
        Exercise::create(array('id'=> 9, 'name' => 'Lateral Machine Raise', 'category' => 1, 'type' => 0, 'bb_link' => 'http://www.bodybuilding.com/exercises/detail/view/name/machine-lateral-raise'));
        Exercise::create(array('id'=> 10, 'name' => 'Rear Delt Dumbbell Raise', 'category' => 1, 'type' => 0, 'bb_link' => 'http://www.bodybuilding.com/exercises/detail/view/name/dumbbell-lying-rear-lateral-raise'));
        Exercise::create(array('id'=> 11, 'name' => 'Rear Delt Machine Fly', 'category' => 1, 'type' => 0));
        Exercise::create(array('id'=> 12, 'name' => 'Arnold Dumbbell Press', 'category' => 1, 'type' => 0));
        Exercise::create(array('id'=> 13, 'name' => 'One-Arm Standing Dumbbell Press', 'category' => 1, 'type' => 0));
        Exercise::create(array('id'=> 14, 'name' => 'Cable Face Pull', 'category' => 1, 'type' => 0));
        Exercise::create(array('id'=> 15, 'name' => 'Log Press', 'category' => 1, 'type' => 0));
        Exercise::create(array('id'=> 16, 'name' => 'Smith Machine Overhead Press', 'category' => 1, 'type' => 0));
        Exercise::create(array('id'=> 17, 'name' => 'Close Grip Barbell Bench Press', 'category' => 2, 'type' => 0));
        Exercise::create(array('id'=> 18, 'name' => 'V-Bar Push Down', 'category' => 2, 'type' => 0));
        Exercise::create(array('id'=> 19, 'name' => 'Parallel Bar Triceps Dip', 'category' => 2, 'type' => 0));
        Exercise::create(array('id'=> 20, 'name' => 'Lying Triceps Extension', 'category' => 2, 'type' => 0));
        Exercise::create(array('id'=> 21, 'name' => 'Rope Push Down', 'category' => 2, 'type' => 0));
        Exercise::create(array('id'=> 22, 'name' => 'Cable Overhead Triceps Extension', 'category' => 2, 'type' => 0));
        Exercise::create(array('id'=> 23, 'name' => 'EZ-Bar Skullcrusher', 'category' => 2, 'type' => 0));
        Exercise::create(array('id'=> 24, 'name' => 'Dumbbell Overhead Triceps Extension', 'category' => 2, 'type' => 0));
        Exercise::create(array('id'=> 25, 'name' => 'Ring Dip', 'category' => 2, 'type' => 0));
        Exercise::create(array('id'=> 26, 'name' => 'Smith Machine Close Grip Bench Press', 'category' => 2, 'type' => 0));
        Exercise::create(array('id'=> 27, 'name' => 'Barbell Curl', 'category' => 3, 'type' => 0));
        Exercise::create(array('id'=> 28, 'name' => 'EZ-Bar Curl', 'category' => 3, 'type' => 0));
        Exercise::create(array('id'=> 29, 'name' => 'Dumbbell Curl', 'category' => 3, 'type' => 0));
        Exercise::create(array('id'=> 30, 'name' => 'Seated Incline Dumbbell Curl', 'category' => 3, 'type' => 0));
        Exercise::create(array('id'=> 31, 'name' => 'Seated Hammer Curl', 'category' => 3, 'type' => 0));
        Exercise::create(array('id'=> 32, 'name' => 'Dumbbell Hammer Curl', 'category' => 3, 'type' => 0));
        Exercise::create(array('id'=> 33, 'name' => 'Cable Curl', 'category' => 3, 'type' => 0));
        Exercise::create(array('id'=> 34, 'name' => 'EZ-Bar Preacher Curl', 'category' => 3, 'type' => 0));
        Exercise::create(array('id'=> 35, 'name' => 'Dumbbell Concentration Curl', 'category' => 3, 'type' => 0));
        Exercise::create(array('id'=> 36, 'name' => 'Dumbbell Preacher Curl', 'category' => 3, 'type' => 0));
        Exercise::create(array('id'=> 37, 'name' => 'Flat Barbell Bench Press', 'category' => 4, 'type' => 0));
        Exercise::create(array('id'=> 38, 'name' => 'Flat Dumbbell Bench Press', 'category' => 4, 'type' => 0));
        Exercise::create(array('id'=> 39, 'name' => 'Incline Barbell Bench Press', 'category' => 4, 'type' => 0));
        Exercise::create(array('id'=> 40, 'name' => 'Decline Barbell Bench Press', 'category' => 4, 'type' => 0));
        Exercise::create(array('id'=> 41, 'name' => 'Incline Dumbbell Bench Press', 'category' => 4, 'type' => 0));
        Exercise::create(array('id'=> 42, 'name' => 'Flat Dumbbell Fly', 'category' => 4, 'type' => 0));
        Exercise::create(array('id'=> 43, 'name' => 'Incline Dumbbell Fly', 'category' => 4, 'type' => 0));
        Exercise::create(array('id'=> 44, 'name' => 'Cable Crossover', 'category' => 4, 'type' => 0));
        Exercise::create(array('id'=> 45, 'name' => 'Incline Hammer Strength Chest Press', 'category' => 4, 'type' => 0));
        Exercise::create(array('id'=> 46, 'name' => 'Decline Hammer Strength Chest Press', 'category' => 4, 'type' => 0));
        Exercise::create(array('id'=> 47, 'name' => 'Seated Machine Fly', 'category' => 4, 'type' => 0));
        Exercise::create(array('id'=> 48, 'name' => 'Deadlift', 'category' => 5, 'type' => 0));
        Exercise::create(array('id'=> 49, 'name' => 'Pull Up', 'category' => 5, 'type' => 0));
        Exercise::create(array('id'=> 50, 'name' => 'Chin Up', 'category' => 5, 'type' => 0));
        Exercise::create(array('id'=> 51, 'name' => 'Neutral Chin Up', 'category' => 5, 'type' => 0));
        Exercise::create(array('id'=> 52, 'name' => 'Dumbbell Row', 'category' => 5, 'type' => 0));
        Exercise::create(array('id'=> 53, 'name' => 'Barbell Row', 'category' => 5, 'type' => 0));
        Exercise::create(array('id'=> 54, 'name' => 'Pendlay Row', 'category' => 5, 'type' => 0));
        Exercise::create(array('id'=> 55, 'name' => 'Lat Pulldown', 'category' => 5, 'type' => 0));
        Exercise::create(array('id'=> 56, 'name' => 'Hammer Strength Row', 'category' => 5, 'type' => 0));
        Exercise::create(array('id'=> 57, 'name' => 'Seated Cable Row', 'category' => 5, 'type' => 0));
        Exercise::create(array('id'=> 58, 'name' => 'T-Bar Row', 'category' => 5, 'type' => 0));
        Exercise::create(array('id'=> 59, 'name' => 'Barbell Shrug', 'category' => 5, 'type' => 0));
        Exercise::create(array('id'=> 60, 'name' => 'Machine Shrug', 'category' => 5, 'type' => 0));
        Exercise::create(array('id'=> 61, 'name' => 'Straight-Arm Cable Pushdown', 'category' => 5, 'type' => 0));
        Exercise::create(array('id'=> 62, 'name' => 'Rack Pull', 'category' => 5, 'type' => 0));
        Exercise::create(array('id'=> 63, 'name' => 'Good Morning', 'category' => 5, 'type' => 0));
        Exercise::create(array('id'=> 64, 'name' => 'Barbell Squat', 'category' => 6, 'type' => 0));
        Exercise::create(array('id'=> 65, 'name' => 'Barbell Front Squat', 'category' => 6, 'type' => 0));
        Exercise::create(array('id'=> 66, 'name' => 'Leg Press', 'category' => 6, 'type' => 0));
        Exercise::create(array('id'=> 67, 'name' => 'Leg Extension Machine', 'category' => 6, 'type' => 0));
        Exercise::create(array('id'=> 68, 'name' => 'Seated Leg Curl Machine', 'category' => 6, 'type' => 0));
        Exercise::create(array('id'=> 69, 'name' => 'Standing Calf Raise Machine', 'category' => 6, 'type' => 0));
        Exercise::create(array('id'=> 70, 'name' => 'Donkey Calf Raise', 'category' => 6, 'type' => 0));
        Exercise::create(array('id'=> 71, 'name' => 'Barbell Calf Raise', 'category' => 6, 'type' => 0));
        Exercise::create(array('id'=> 72, 'name' => 'Barbell Glute Bridge', 'category' => 6, 'type' => 0));
        Exercise::create(array('id'=> 73, 'name' => 'Glute-Ham Raise', 'category' => 6, 'type' => 0));
        Exercise::create(array('id'=> 74, 'name' => 'Lying Leg Curl Machine', 'category' => 6, 'type' => 0));
        Exercise::create(array('id'=> 75, 'name' => 'Romanian Deadlift', 'category' => 6, 'type' => 0));
        Exercise::create(array('id'=> 76, 'name' => 'Stiff-Legged Deadlift', 'category' => 6, 'type' => 0));
        Exercise::create(array('id'=> 77, 'name' => 'Sumo Deadlift', 'category' => 6, 'type' => 0));
        Exercise::create(array('id'=> 78, 'name' => 'Seated Calf Raise Machine', 'category' => 6, 'type' => 0));
        Exercise::create(array('id'=> 79, 'name' => 'Ab-Wheel Rollout', 'category' => 7, 'type' => 0));
        Exercise::create(array('id'=> 80, 'name' => 'Cable Crunch', 'category' => 7, 'type' => 0));
        Exercise::create(array('id'=> 81, 'name' => 'Crunch', 'category' => 7, 'type' => 0));
        Exercise::create(array('id'=> 82, 'name' => 'Crunch Machine', 'category' => 7, 'type' => 0));
        Exercise::create(array('id'=> 83, 'name' => 'Decline Crunch', 'category' => 7, 'type' => 0));
        Exercise::create(array('id'=> 84, 'name' => 'Dragon Flag', 'category' => 7, 'type' => 0));
        Exercise::create(array('id'=> 85, 'name' => 'Hanging Knee Raise', 'category' => 7, 'type' => 0));
        Exercise::create(array('id'=> 86, 'name' => 'Hanging Leg Raise', 'category' => 7, 'type' => 0));
        Exercise::create(array('id'=> 87, 'name' => 'Plank', 'category' => 7, 'type' => 0));
        Exercise::create(array('id'=> 88, 'name' => 'Side Plank', 'category' => 7, 'type' => 0));
        Exercise::create(array('id'=> 89, 'name' => 'Cycling', 'category' => 8, 'type' => 1));
        Exercise::create(array('id'=> 90, 'name' => 'Walking', 'category' => 8, 'type' => 1));
        Exercise::create(array('id'=> 91, 'name' => 'Rowing Machine', 'category' => 8, 'type' => 1));
        Exercise::create(array('id'=> 92, 'name' => 'Stationary Bike', 'category' => 8, 'type' => 1));
        Exercise::create(array('id'=> 93, 'name' => 'Swimming', 'category' => 8, 'type' => 1));
        Exercise::create(array('id'=> 94, 'name' => 'Running (Treadmill)', 'category' => 8, 'type' => 1));
        Exercise::create(array('id'=> 95, 'name' => 'Running (Outdoor)', 'category' => 8, 'type' => 1));
        Exercise::create(array('id'=> 96, 'name' => 'Elliptical Trainer', 'category' => 8, 'type' => 1));
        Exercise::create(array('id'=> 97, 'name' => 'Dumbell Shrug', 'category' => 1, 'type' => 0));
	}


}
