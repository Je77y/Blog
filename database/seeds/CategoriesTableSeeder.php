<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert(
        	[
        		'title' => 'Web Design',
	        	'slug' => 'web-design'
        	],
        	[
        		'title' => 'Web Development',
	        	'slug' => 'web-development'
        	],
        	[
        		'title' => 'General',
	        	'slug' => 'general'
        	]
        );

        // update the posts data 
        for ($i = 1; $i <= 10; $i++)
        {
        	$category_id = rand(1, 3);

        	DB::table('posts')
        		->where('id', $i)
        		->update(['category_id' => $category_id]);
        }
    }
}
