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
				'password' => bcrypt('abcdef'),
				'role_id' => 1 // quanlychinh
        	],
        	[
        		'name' => "Hung",
        		'email' => "hung@gmail.com",
				'password' => bcrypt('password'),
				'role_id' => 2 // quanlyphu
        	],
        	[
        		'name' => "Vu",
        		'email' => "vu@gmail.com",
				'password' => bcrypt('kuonvu'),
				'role_id' => 3 // tacgia
        	]
        ]);
    }
}
