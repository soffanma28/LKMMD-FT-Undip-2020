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
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@admin.com',
            'password' => bcrypt('admin'),
            'user_type' => 'superadmin',
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'user_type' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'Panitia',
            'username' => 'panitia',
            'email' => 'panitia@lkmmdft.com',
            'password' => bcrypt('panitiadasarft2020'),
            'user_type' => 'panitia',
        ]);
    }
}
