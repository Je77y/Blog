<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->truncate();

        $createdDate = Carbon::now();

        DB::table('categories')->insert([
        	[
        		'title' => 'Web Design',
	        	'slug' => 'web-design',
                'created_at' => $createdDate,
                'updated_at' => $createdDate,
        	],
        	[
        		'title' => 'Web Development',
	        	'slug' => 'web-development',
                'created_at' => $createdDate,
                'updated_at' => $createdDate,
        	],
        	[
        		'title' => 'General',
	        	'slug' => 'general',
                'created_at' => $createdDate,
                'updated_at' => $createdDate,
        	]
        ]);

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
