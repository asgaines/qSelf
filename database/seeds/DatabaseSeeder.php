<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Frustratingly, this seems required from forum conversations...
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		Model::unguard();

		$this->call('ThoughtTableSeeder');
		$this->command->info('Thought table successfully seeded');

		$this->call('UserTableSeeder');
		$this->command->info('User table successfully seeded');

		$this->call('TemperatureTableSeeder');
		$this->command->info('Temperature table successfully seeded');

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
    DB::table('users')->delete();  // Clear the table first so as not to add duplicate profiles

    $users = array(
      array(
				'id' => 1,
        'name' => 'Dummy Profile1',
        'password' => Hash::make('password1'),
        'email' => 'example1@example.com'
      ),
      array(
				'id' => 2,
        'name' => 'Dummy Profile2',
        'password' => Hash::make('password2'),
        'email' => 'example2@example.com'
      )
    );

    DB::table('users')->insert($users);
	}

}

class ThoughtTableSeeder extends Seeder {

	public function run()
	{
		DB::table('thoughts')->delete();

		$thoughts = array(
			array(
				'thought' => 'Feeling energetic',
				'user_id' => 1,
				'created_at' => date('2015-05-28 11:11:11'),
			),
			array(
				'thought' => 'Got tired all of a sudden',
				'user_id' => 2,
				'created_at' => date('2015-05-22 11:11:11'),
			)
		);

		DB::table('thoughts')->insert($thoughts);
	}
}

class TemperatureTableSeeder extends Seeder {

	public function run()
	{
		DB::table('temperatures')->delete();

		$temperatures = array(
			array(
				'temperature' => 98.7,
				'user_id' => 1,
				'created_at' => date('2015-05-26 11:11:11'),
			),
			array(
				'temperature' => 98.8,
				'user_id' => 1,
				'created_at' => date('2015-05-27 11:11:11'),
			),
			array(
				'temperature' => 99.2,
				'user_id' => 1,
				'created_at' => date('2015-05-28 11:11:11'),
			),
			array(
				'temperature' => 97.1,
				'user_id' => 1,
				'created_at' => date('2015-05-29 11:11:11'),
			),
			array(
				'temperature' => 97.1,
				'user_id' => 2,
				'created_at' => date('2015-05-20 11:11:11'),
			),
			array(
				'temperature' => 97.1,
				'user_id' => 2,
				'created_at' => date('2015-05-21 11:11:11'),
			),
			array(
				'temperature' => 97.7,
				'user_id' => 2,
				'created_at' => date('2015-05-22 11:11:11'),
			),
			array(
				'temperature' => 97.3,
				'user_id' => 2,
				'created_at' => date('2015-05-23 11:11:11'),
			),
		);

		DB::table('temperatures')->insert($temperatures);
	}
}
