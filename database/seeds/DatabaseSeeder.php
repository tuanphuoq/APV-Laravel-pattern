<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(GroupSeeder::class);
    }
}

/**
 * Group Seeder
 */
class GroupSeeder extends Seeder
{
	public function run()
	{
		DB::table('groups')->insert([
			['group_name'=>'admin'],
			['group_name'=>'user']
		]);
	}
}

