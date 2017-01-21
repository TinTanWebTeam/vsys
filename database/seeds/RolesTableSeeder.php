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
            'Admin',
            'UserManagement',
            'DriverManagement',
            'VehicleAllManagement',
            'CustomerManagement',
            'VehicleManagement',
            'DebtManagement',
            'CostManagement',
            'PostageManagement',
            'FuelManagement',
            'Report',
            'RevenueManagement',
            'Customer',
            'DeliveryRequirement',
            'VehicleInside',
            'VehicleOutside',
            'DebtCustomer',
            'DebtVehicleOutside',
            'FuelCost',
            'PetroleumCost',
            'ParkingCost',
            'OtherCost',
            'RevenueReport',
            'HistoryDeliveryReport',
            'Position',
            'User',
            'Oil',
            'Lube'
        ];

        $array_description = [
            'Quản trị viên',
            'QL người dùng',
            'QL tài xế',
            'QL xe',
            'QL khách hàng',
            'QL nhà xe',
            'QL công nợ',
            'QL chi phí',
            'QL cước phí',
            'QL giá nhiên liệu',
            'Báo cáo',
            'QL doanh thu',
            'Khách hàng',
            'Đơn hàng',
            'Nhà xe công ty',
            'Nhà xe ngoài',
            'Khách hàng',
            'Nhà xe',
            'Dầu',
            'Thay nhớt',
            'Đậu bãi',
            'Khác',
            'Doanh thu',
            'Lịch sử giao hàng',
            'Chức vụ',
            'Tài khoản',
            'Dầu',
            'Nhớt'
        ];

        foreach($array_name as $key => $name){
            \App\Role::create([
                'name' => $array_name[$key],
                'description' => $array_description[$key]
            ]);
        }
    }
}
