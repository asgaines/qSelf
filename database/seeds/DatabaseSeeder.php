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
		// I believe Laravel doesn't notify of a successful seeding
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
                    'name' => 'Dummy No1',
                    'password' => Hash::make('password1'),
                    'email' => 'dummy1@example.com'
                ),
                array(
                    'id' => 2,
                    'name' => 'Dummy No2',
                    'password' => Hash::make('password2'),
                    'email' => 'dummy2@example.com'
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
				'thought' => 'Getting over a fever',
				'user_id' => 1,
				'created_at' => '2015-05-23 09:11:11',
			),
			array(
				'thought' => 'Feeling energetic',
				'user_id' => 1,
				'created_at' => date('2015-05-26 11:11:11'),
			),
			array(
				'thought' => 'I think ovulation began around here',
				'user_id' => 2,
				'created_at' => date('2015-05-13 12:50:11'),
			),
			array(
				'thought' => 'Had my period',
				'user_id' => 2,
				'created_at' => date('2015-05-24 07:11:11'),
			),
			array(
				'thought' => 'Hypothermia...',
				'user_id' => 2,
				'created_at' => date('2015-05-29 11:11:11'),
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
			// Dummy No1's temperature recordings (tracking a fever)
			array(
				'temperature' => 100.9,
				'user_id' => 1,
				'created_at' => date('2015-05-22 03:11:11'),
			),
			array(
				'temperature' => 99.3,
				'user_id' => 1,
				'created_at' => date('2015-05-23 03:11:11'),
			),
			array(
				'temperature' => 98.7,
				'user_id' => 1,
				'created_at' => date('2015-05-24 03:11:11'),
			),
			array(
				'temperature' => 98.7,
				'user_id' => 1,
				'created_at' => date('2015-05-25 03:11:11'),
			),
			array(
				'temperature' => 98.7,
				'user_id' => 1,
				'created_at' => date('2015-05-26 09:11:11'),
			),
			array(
				'temperature' => 98.8,
				'user_id' => 1,
				'created_at' => date('2015-05-27 11:11:11'),
			),
			array(
				'temperature' => 99.2,
				'user_id' => 1,
				'created_at' => date('2015-05-28 12:11:11'),
			),
			array(
				'temperature' => 97.1,
				'user_id' => 1,
				'created_at' => date('2015-05-29 11:11:11'),
			),
		); // Close the array, but will be appended to for Dummy No2

		// Dummy No2's Temperature data (tracking a mentrual cycle)
		for ($i = 0; $i < 14; $i++)
		{
			array_push($temperatures, array(
				'temperature' => 98.6,
				'user_id' => 2,
				'created_at' => date('2015-05-'.($i + 1).' 11:11:11'),
			));
		}
		for ($o = 0; $o < 7; $o++)
		{
			array_push($temperatures, array(
				'temperature' => 99.2,
				'user_id' => 2,
				'created_at' => date('2015-05-'.($o + 15).' 11:11:11'),
			));
		}
		for ($i = 0; $i < 7; $i++)
		{
			array_push($temperatures, array(
				'temperature' => 98.6,
				'user_id' => 2,
				'created_at' => date('2015-05-'.($i + 22).' 11:11:11'),
			));
		}
		array_push($temperatures, array(
			'temperature' => 95,
			'user_id' => 2,
			'created_at' => date('2015-05-29 11:11:11'),
		));

		DB::table('temperatures')->insert($temperatures);
	}
}
