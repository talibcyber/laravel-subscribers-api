<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SubscribersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscribers')->insert([
			[
				'email' => str_random(10).'@gmail.com',
				'name' => str_random(10),
				'state' => 'active',
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
			[
				'email' => str_random(10).'@gmail.com',
				'name' => str_random(10),
				'state' => 'active',
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
			[
				'email' => str_random(10).'@gmail.com',
				'name' => str_random(10),
				'state' => 'active',
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
			[
				'email' => str_random(10).'@gmail.com',
				'name' => str_random(10),
				'state' => 'active',
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
			[
				'email' => str_random(10).'@gmail.com',
				'name' => str_random(10),
				'state' => 'active',
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
			[
				'email' => str_random(10).'@gmail.com',
				'name' => str_random(10),
				'state' => 'active',
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
			[
				'email' => str_random(10).'@gmail.com',
				'name' => str_random(10),
				'state' => 'active',
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
			[
				'email' => str_random(10).'@gmail.com',
				'name' => str_random(10),
				'state' => 'active',
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
			[
				'email' => str_random(10).'@gmail.com',
				'name' => str_random(10),
				'state' => 'active',
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
			[
				'email' => str_random(10).'@gmail.com',
				'name' => str_random(10),
				'state' => 'active',
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
		]);
    }
}
