<?php

class DogsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('dogs')->truncate();

		$dogs = array(
			array('name' => 'mickey', 'age' => 4),
			array('name' => 'laravel', 'age' => 10),
			array('name' => 'Yii suck', 'age' => 9)
		);

		// Uncomment the below to run the seeder
		DB::table('dogs')->insert($dogs);
	}

}
