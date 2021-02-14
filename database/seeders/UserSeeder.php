<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin role 1
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Sameer Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),    
        ]);
        //supervisor role 2
        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Supervisor',
            'email' => 'supervisor1@gmail.com',
            'password' => bcrypt('12345678'),    
        ]);
    }
}
