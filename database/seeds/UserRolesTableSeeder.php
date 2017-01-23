<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        for ($i = 1; $i <= 7; $i++) {
            \App\UserRole::create([
                'user_id'    => 1,
                'role_id'    => $i,
                'created_by' => 1,
                'updated_by' => 1,
                'active'     => true
            ]);
        }

        //user
        for ($i = 4; $i <= 7; $i++) {

            if($i == 4){
                \App\UserRole::create([
                    'user_id'    => 2,
                    'role_id'    => 1,
                    'created_by' => 1,
                    'updated_by' => 1,
                    'active'     => true
                ]);
            }

            \App\UserRole::create([
                'user_id'    => 2,
                'role_id'    => $i,
                'created_by' => 1,
                'updated_by' => 1,
                'active'     => true
            ]);
        }
    }
}
