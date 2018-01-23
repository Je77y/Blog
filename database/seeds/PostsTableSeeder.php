<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        // reset the posts table
        DB::table('posts')->truncate();

        // generate 10 dummy posts data
        $posts = [];

        $faker = Factory::create();

        for($i = 1; $i <= 10; $i++)
        {
        	$image = rand(1, 5) . ".jpg";
        	$date = date("Y-m-d H:i:s", strtotime("2018-01-23 09:21:00 +{$i} days"));

        	$posts[] = [
        		'author_id' => rand(1, 3),
        		'title' => $faker->sentence(rand(8, 12)),
        		'excerpt' => $faker->sentence(rand(250, 300)),
        		'body' => $faker->paragraphs(rand(10, 15), true), 
        		'slug' => $faker->slug(),
        		'image' => rand(0, 1) == 1 ? $image : NULL,
        		'created_at' => $date,
        		'updated_at' => $date
        	];	
        }

        DB::table('posts')->insert($posts);
    }
}
