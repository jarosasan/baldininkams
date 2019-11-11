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
            'name'=>'superAdmin',
            'email'=>'sadmin@sadmin.com',
            'role'=>'superAdmin',
            'password'=>bcrypt('12345678')
        ]);
        DB::table('users')->insert([
            'name'=>'user',
            'email'=>'user@user.com',
            'role'=>'user',
            'password'=>bcrypt('12345678')
        ]);
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'role'=>'admin',
            'password'=>bcrypt('12345678')
        ]);
    }
}
