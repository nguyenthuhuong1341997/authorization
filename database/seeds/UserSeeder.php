<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\DB::table('users')->truncate();
		$faker = Faker\Factory::create();
		for ($i = 1; $i < 6; $i++) {
		   DB::table('users')->insert([ //,
		   'name' => $faker->name,
		   'email' => 'admin'.$i.'@gmail.com',
		   'password' => bcrypt('123456'),
		   ]);
		}
    }
}
