<?php

use Illuminate\Database\Seeder;

class IOCentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_name = [
            'IOCenter1',
            'IOCenter2',
            'IOCenter3'
        ];

        $array_input = [
            'I401',
            'I402',
            'I403'
        ];

        $array_output = [
            'O401',
            'O402',
            'O403'
        ];

        foreach($array_name as $key => $name){
            \App\IOCenter::create([
                'name'        => $name,
                'description' => $name,
                'input'       => $array_input[$key],
                'output'      => $array_output[$key],
                'active'      => true
            ]);
        }
    }
}
