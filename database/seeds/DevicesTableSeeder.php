<?php

use Illuminate\Database\Seeder;

class DevicesTableSeeder extends Seeder
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

        $array_description = [
            'Card Reader',
            'Button Port',
            'Button'
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

        // Card Reader
        \App\Device::create([
            'name'        => 'Card Reader',
            'description' => 'Cửa vào',
            'input'       => 'I401',
            'output'      => 'O401',
            'active'      => true,
            'collect_id'  => 1,
            'io_center_id' => 1,
            'parent_id'   => 0
        ]);
        \App\Device::create([
            'name'        => 'Card Reader',
            'description' => 'Cửa ra',
            'input'       => 'I402',
            'output'      => 'O402',
            'active'      => true,
            'collect_id'  => 1,
            'io_center_id' => 1,
            'parent_id'   => 0
        ]);

        // Button Port
        \App\Device::create([
            'name'        => 'Button Port',
            'description' => 'Port 1',
            'input'       => 'I401',
            'output'      => 'O401',
            'active'      => true,
            'collect_id'  => 2,
            'io_center_id' => 1,
            'parent_id'   => 0
        ]);
        \App\Device::create([
            'name'        => 'Button Port',
            'description' => 'Port 2',
            'input'       => 'I401',
            'output'      => 'O401',
            'active'      => true,
            'collect_id'  => 2,
            'io_center_id' => 1,
            'parent_id'   => 0
        ]);

        // Button of Port 1
        \App\Device::create([
            'name'        => 'Button',
            'description' => 'Button 1 Port 1',
            'input'       => 'I401',
            'output'      => 'O401',
            'active'      => true,
            'collect_id'  => 3,
            'io_center_id' => 1,
            'parent_id'   => 3
        ]);
        \App\Device::create([
            'name'        => 'Button',
            'description' => 'Button 2 Port 1',
            'input'       => 'I401',
            'output'      => 'O401',
            'active'      => true,
            'collect_id'  => 3,
            'io_center_id' => 1,
            'parent_id'   => 3
        ]);
        \App\Device::create([
            'name'        => 'Button',
            'description' => 'Button 3 Port 1',
            'input'       => 'I401',
            'output'      => 'O401',
            'active'      => true,
            'collect_id'  => 3,
            'io_center_id' => 1,
            'parent_id'   => 3
        ]);
        \App\Device::create([
            'name'        => 'Button',
            'description' => 'Button 4 Port 1',
            'input'       => 'I401',
            'output'      => 'O401',
            'active'      => true,
            'collect_id'  => 3,
            'io_center_id' => 1,
            'parent_id'   => 3
        ]);
        \App\Device::create([
            'name'        => 'Button',
            'description' => 'Button 5 Port 1',
            'input'       => 'I401',
            'output'      => 'O401',
            'active'      => true,
            'collect_id'  => 3,
            'io_center_id' => 1,
            'parent_id'   => 3
        ]);
        // Button of Port 2
        \App\Device::create([
            'name'        => 'Button',
            'description' => 'Button 1 Port 2',
            'input'       => 'I401',
            'output'      => 'O401',
            'active'      => true,
            'collect_id'  => 3,
            'io_center_id' => 1,
            'parent_id'   => 4
        ]);
        \App\Device::create([
            'name'        => 'Button',
            'description' => 'Button 2 Port 2',
            'input'       => 'I401',
            'output'      => 'O401',
            'active'      => true,
            'collect_id'  => 3,
            'io_center_id' => 1,
            'parent_id'   => 4
        ]);
        \App\Device::create([
            'name'        => 'Button',
            'description' => 'Button 3 Port 2',
            'input'       => 'I401',
            'output'      => 'O401',
            'active'      => true,
            'collect_id'  => 3,
            'io_center_id' => 1,
            'parent_id'   => 4
        ]);
        \App\Device::create([
            'name'        => 'Button',
            'description' => 'Button 4 Port 2',
            'input'       => 'I401',
            'output'      => 'O401',
            'active'      => true,
            'collect_id'  => 3,
            'io_center_id' => 1,
            'parent_id'   => 4
        ]);
        \App\Device::create([
            'name'        => 'Button',
            'description' => 'Button 5 Port 2',
            'input'       => 'I401',
            'output'      => 'O401',
            'active'      => true,
            'collect_id'  => 3,
            'io_center_id' => 1,
            'parent_id'   => 4
        ]);
    }
}
