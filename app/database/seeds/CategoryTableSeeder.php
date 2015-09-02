<?php

class CategoryTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('category')->delete();
        Category::create(array('id'=> 1, 'name' => 'Shoulders'));
        Category::create(array('id'=> 2, 'name' => 'Triceps'));
        Category::create(array('id'=> 3, 'name' => 'Biceps'));
        Category::create(array('id'=> 4, 'name' => 'Chest'));
        Category::create(array('id'=> 5, 'name' => 'Back'));
        Category::create(array('id'=> 6, 'name' => 'Legs'));
        Category::create(array('id'=> 7, 'name' => 'Abs'));
        Category::create(array('id'=> 8, 'name' => 'Cardio'));        

	}

}
