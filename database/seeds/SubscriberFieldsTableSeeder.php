<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SubscriberFieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriber_fields')->insert([
			[
				'title' => 'name',
				'type' => 'string',
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
			[
				'title' => 'email',
				'type' => 'string',
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
			[
				'title' => 'state',
				'type' => 'string',
				'created_at' => Carbon::now()->format('Y-m-d H:i:s')
			]
			,
			
		]);
    }
}
