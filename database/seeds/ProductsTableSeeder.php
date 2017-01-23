<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_name = [
            'Cocacola',
            'Pepsi',
            'Mirinda',
            'Bitis Hunter',
            'Convert',
            'Nike'
        ];

        $array_product_type = [
            1,
            1,
            1,
            3,
            3,
            3
        ];

        foreach($array_name as $key => $name){
            \App\Product::create([
                'name'        => $name,
                'description' => $name,
                'active'      => true,
                'product_type_id' => $array_product_type[$key]
            ]);
        }
    }
}
