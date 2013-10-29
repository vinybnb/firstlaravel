<?php

class PostsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('posts')->truncate();

		$posts = array(
			array('title' => 'nha mat pho', 'body' => 'ban nha mat pho ha noi'),
			array('title' => 'nha mat ngo', 'body' => 'ban nha mat ngo ha noi')
		);

		// Uncomment the below to run the seeder
		DB::table('posts')->insert($posts);
	}

}
