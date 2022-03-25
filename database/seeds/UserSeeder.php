<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'admin', 
            'email' => 'admin@gmail.com', 
            'password' => bcrypt('admin123'), 
            'admin' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'member',
            'email' => 'member@gmail.com',
            'password' => bcrypt('member123'),
            'admin' => 0
        ]);
    }
}
