<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        // reset the posts table
        DB::table('posts')->truncate();

        // generate 10 dummy posts data
        $posts = [];

        $faker = Factory::create();
        $date = Carbon::create(2018, 01, 11, 21);        

        for($i = 1; $i <= 10; $i++)
        {
        	$image = "Post_Image_" . rand(1, 5) . ".jpg";
        	$date->addDays($i);
            // date("Y-m-d H:i:s", strtotime("2018-01-23 09:21:00 +{$i} days"));
            $publishedDate = clone($date);
            $createdDate = clone($date);

        	$posts[] = [
        		'author_id' => rand(1, 3),
        		'title' => $faker->sentence(rand(8, 12)),
        		'excerpt' => $faker->sentence(rand(100, 150)),
        		'body' => $faker->paragraphs(rand(10, 15), true), 
        		'slug' => $faker->slug(),
        		'image' => rand(0, 1) == 1 ? $image : NULL,
        		'created_at' => $createdDate,
        		'updated_at' => $createdDate,
                'published_at' => $i < 5 ? $publishedDate : ( rand(0, 1) == 0 ? NULL : $publishedDate->addDays($i) ),
                'category_id' => 0
        	];	
        }

        DB::table('posts')->insert($posts);
    }
}
