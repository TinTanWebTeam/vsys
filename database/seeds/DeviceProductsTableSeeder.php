<?php

use Illuminate\Database\Seeder;

class DeviceProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 5; $i <= 9; $i ++){
            \App\DeviceProduct::create([
                'device_id'  => $i,
                'product_id' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'active' => true
            ]);
        }

        for($i = 10; $i <= 14; $i ++){
            \App\DeviceProduct::create([
                'device_id'  => $i,
                'product_id' => 2,
                'created_by' => 1,
                'updated_by' => 1,
                'active' => true
            ]);
        }
        
    }
}
