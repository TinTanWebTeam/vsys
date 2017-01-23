<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_name = [
            'Dashboard',
            'IOCenter',
            'Collection',
            'Device',
            'ProductType',
            'Product',
            'Supplier',
            'Staff'
        ];

        $array_description = [
            'Trang chủ',
            'Bộ xử lý trung tâm',
            'Loại thiết bị',
            'Thiết bị',
            'Loại sản phẩm',
            'Sản phẩm',
            'Nhà cung cấp',
            'Nhân viên'
        ];

        foreach($array_name as $key => $name){
            \App\Role::create([
                'name'        => $array_name[$key],
                'description' => $array_description[$key],
                'active'      => true
            ]);
        }
    }
}
