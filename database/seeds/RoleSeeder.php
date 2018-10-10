<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$role_employee = new Role();
		$role_employee->type = 'CEO';
		$role_employee->description = 'A CEO User';
		$role_employee->save();

		$role_employee = new Role();
		$role_employee->type = 'Leader_1';
		$role_employee->description = 'A Leader_1 User';
		$role_employee->save();

		$role_manager = new Role();
		$role_manager->type = 'Leader_2';
		$role_manager->description = 'A Leader_2 User';
		$role_manager->save();

		$role_manager = new Role();
		$role_manager->type = 'Leader_3';
		$role_manager->description = 'A Leader_3 User';
		$role_manager->save();

		$role_manager = new Role();
		$role_manager->type = 'User_2';
		$role_manager->description = 'A User_2 User';
		$role_manager->save();
    }
}
