<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \DB::table('permissions')->truncate();
       \DB::table('permissions')->insert([
           'permission'  => 'showUser',
           'description' => 'Xem chi tiet nhan vien'
       ]);
       \DB::table('permissions')->insert([
           'permission'  => 'addUser',
           'description' => 'Them nhan vien'
       ]);\DB::table('permissions')->insert([
           'permission'  => 'editUser',
           'description' => 'Sua thong tin nhan vien'
       ]);
       \DB::table('permissions')->insert([
           'permission'  => 'deleteUser',
           'description' => 'Xoa thong tin nhan vien'
       ]);
    }
}
