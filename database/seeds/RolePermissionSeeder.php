<?php

use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('role_permissions')->truncate();
		$faker = Faker\Factory::create();
		for ($i = 1; $i < 12; $i++) {
		   DB::table('role_permissions')->insert([ //,
		   'role_id' => $faker->numberBetween($min = 1, $max = 5),
		   'permission_id' => $faker->numberBetween($min = 1, $max = 4),
		   ]);
		}
    }
}
