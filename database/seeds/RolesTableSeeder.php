<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // reset table role
        DB::table('role')->truncate();

        $now = Carbon::now();
        DB::table('role')->insert([
        	[
        		'name' => "SuperAdmin",
                'slug' => "super-admin",
                'created_at' => $now,
                'updated_at' => $now
        		
        	],
        	[
        		'name' => "Admin",
        		'slug' => "admin",
        		'created_at' => $now,
                'updated_at' => $now
        	],
        	[
        		'name' => "User",
        		'slug' => "user",
        		'created_at' => $now,
                'updated_at' => $now
            ],
            [
        		'name' => "Test",
        		'slug' => "test",
        		'created_at' => $now,
                'updated_at' => $now
        	]
        ]);
    }
}
