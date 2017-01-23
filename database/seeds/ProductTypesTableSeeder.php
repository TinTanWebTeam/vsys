<?php

use Illuminate\Database\Seeder;

class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_name = [
            'Nước giải khát',
            'Sữa',
            'Giày dép',
            'Quần áo',
            'Trang sức',
            'Thuốc'
        ];

        foreach($array_name as $key => $name){
            \App\ProductType::create([
                'name'        => $name,
                'description' => $name,
                'active'      => true
            ]);
        }
    }
}
