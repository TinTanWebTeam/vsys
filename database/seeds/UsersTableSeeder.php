<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
        	'username' => 'admin',
            'fullname' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' => encrypt('123456',Config::get('app.key')),
            'position_id' => 0
        ]);
        \App\User::create([
        	'username' => 'user',
            'fullname' => 'user',
        	'email' => 'user@gmail.com',
        	'password' => encrypt('123456',Config::get('app.key')),
            'position_id' => 0
        ]);
    }
}
