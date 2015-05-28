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
		Model::unguard();

		$this->call('UserTableSeeder');
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
        'name' => 'Dummy Profile1',
        'password' => Hash::make('password1'),
        'email' => 'example1@example.com'
      ),
      array(
        'name' => 'Dummy Profile2',
        'password' => Hash::make('password2'),
        'email' => 'example2@example.com'
      )
    );

    DB::table('users')->insert($users);
	}

}
