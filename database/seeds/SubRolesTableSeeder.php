<?php

use Illuminate\Database\Seeder;

class SubRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        for ($i = 1; $i < 12; $i++) {
            \App\SubRole::create([
                'user_id'   => 1,
                'role_id'   => $i,
                'created_by' => 1,
                'updated_by' => 1
            ]);
        }

        //user
        for ($i = 3; $i < 12; $i++) {
            \App\SubRole::create([
                'user_id'   => 2,
                'role_id'   => $i,
                'created_by' => 1,
                'updated_by' => 1
            ]);
        }
    }
}
