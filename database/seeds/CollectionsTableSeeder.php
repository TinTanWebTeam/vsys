<?php

use Illuminate\Database\Seeder;

class CollectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_name = [
            'Card Reader',
            'Button Port',
            'Button'
        ];

        foreach($array_name as $key => $name){
            \App\Collection::create([
                'name'        => $name,
                'description' => $name,
                'active'      => true
            ]);
        }
    }
}
