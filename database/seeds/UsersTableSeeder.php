<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // reset the users table
        DB::table('users')->truncate();

        // Generate 3 users/author
        DB::table('users')->insert([
        	[
        		'name' => "Cuong",
        		'email' => "cuong@gmail.com",
        		'password' => bcrypt('123456')
        	],
        	[
        		'name' => "Hung",
        		'email' => "hung@gmail.com",
        		'password' => bcrypt('123456')
        	],
        	[
        		'name' => "Vu",
        		'email' => "vu@gmail.com",
        		'password' => bcrypt('123456')
        	]
        ]);
    }
}
