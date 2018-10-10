<?php

use Illuminate\Database\Seeder;

class UserHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user_has_roles')->truncate();
		$faker = Faker\Factory::create();
		for ($i = 1; $i < 12; $i++) {
		   DB::table('user_has_roles')->insert([ //,
		   'user_id' => $faker->numberBetween($min = 1, $max = 5),
		   'role_id' => $faker->numberBetween($min = 1, $max = 5),
		   ]);
		}
    }
}
