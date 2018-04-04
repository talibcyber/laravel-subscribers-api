<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
			[
				'name' => str_random(10),
				'email' => str_random(10).'@gmail.com',
				'password' => bcrypt('secret'),
				'api_token' => str_random(60),
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
			[
				'name' => str_random(10),
				'email' => str_random(10).'@gmail.com',
				'password' => bcrypt('secret'),
				'api_token' => str_random(60),
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
			[
				'name' => str_random(10),
				'email' => str_random(10).'@gmail.com',
				'password' => bcrypt('123456'),
				'api_token' => str_random(60),
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
			[
				'name' => str_random(10),
				'email' => str_random(10).'@gmail.com',
				'password' => bcrypt('123456'),
				'api_token' => str_random(60),
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
			[
				'name' => str_random(10),
				'email' => str_random(10).'@gmail.com',
				'password' => bcrypt('123456'),
				'api_token' => str_random(60),
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
			[
				'name' => str_random(10),
				'email' => str_random(10).'@gmail.com',
				'password' => bcrypt('123456'),
				'api_token' => str_random(60),
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
			[
				'name' => str_random(10),
				'email' => str_random(10).'@gmail.com',
				'password' => bcrypt('123456'),
				'api_token' => str_random(60),
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
		]);
    }
}
