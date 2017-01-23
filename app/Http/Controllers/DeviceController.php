<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\Collection;
use App\IOCenter;

class DeviceController extends Controller
{
    /* API METHOD */
    public function getAll(){
        $arr_datas = $this->all();
        return response()->json([
            'devices'     => $arr_datas['devices'],
            'collections' => $arr_datas['collections'],
            'io_centers'  => $arr_datas['io_centers']
        ], 200);
    }

    public function getOne(Request $request){
        $id = 0;
        $device = $this->one(0);
        return response()->json([
            'device' => $device
        ], 200);
    }

    public function postAddOne(Request $request){
        $this->addOne($request->input('device'));
        $arr_datas = $this->all();
        return response()->json([
            'devices'     => $arr_datas['devices'],
            'collections' => $arr_datas['collections'],
            'io_centers'  => $arr_datas['io_centers']
        ], 200);
    }

    public function putUpdateOne(Request $request){
        $this->updateOne($request->input('device'));
        $arr_datas = $this->all();
        return response()->json([
            'devices'     => $arr_datas['devices'],
            'collections' => $arr_datas['collections'],
            'io_centers'  => $arr_datas['io_centers']
        ], 200);
    }

    public function patchDeactiveOne(Request $request){
        $id = $request->input('id');
        $this->deactiveOne($id);
        $arr_datas = $this->all();
        return response()->json([
            'devices'     => $arr_datas['devices'],
            'collections' => $arr_datas['collections'],
            'io_centers'  => $arr_datas['io_centers']
        ], 200);
    }

    public function deleteDeleteOne(Request $request){
        $id = $request->input('id');
        $this->deleteOne($id);
        $arr_datas = $this->all();
        return response()->json([
            'devices'     => $arr_datas['devices'],
            'collections' => $arr_datas['collections'],
            'io_centers'  => $arr_datas['io_centers']
        ], 200);
    }

    /* LOGIC METHOD */
    public function all(){
        $devices = Device::where('devices.active', true)
            ->leftJoin('collections', 'collections.id', '=', 'devices.collect_id')
            ->leftJoin('io_centers', 'io_centers.id', '=', 'devices.io_center_id')
            ->leftJoin('devices as parent', 'parent.id', '=', 'devices.parent_id')
            ->select('devices.*', 'collections.name as collect_name', 'io_centers.name as io_center_name', 'parent.name as parent_name')
            ->get();
        $collections = Collection::where('collections.active', true)->get();
        $io_centers = IOCenter::where('io_centers.active', true)->get();
        return [
            'devices'     => $devices,
            'collections' => $collections,
            'io_centers'  => $io_centers
        ];
    }

    public function one($id){
        $device = Device::find($id);
        return $device;
    }

    public function addOne($data){
        if($data['name'] != '' 
            && $data['description'] != ''
            && $data['collect_id'] != ''
            && $data['io_center_id'] != ''
            && $data['parent_id'] != ''){
            $device = new Device;
            $device->name = $data['name'];
            $device->description = $data['description'];
            $device->input = $data['input'];
            $device->output = $data['output'];
            $device->active = true;
            $device->collect_id = $data['collect_id'];
            $device->io_center_id = $data['io_center_id'];
            $device->parent_id = $data['parent_id'];
            $device->save();
        }
    }

    public function updateOne($data){
        if($data['name'] != '' 
            && $data['description'] != ''
            && $data['collect_id'] != ''
            && $data['io_center_id'] != ''
            && $data['parent_id'] != ''){
            $device = Device::find($data['id']);
            $device->name = $data['name'];
            $device->description = $data['description'];
            $device->input = $data['input'];
            $device->output = $data['output'];
            $device->active = true;
            $device->collect_id = $data['collect_id'];
            $device->io_center_id = $data['io_center_id'];
            $device->parent_id = $data['parent_id'];
            $device->update();
        }
    }

    public function deactiveOne($id){
        $device = Device::find($id);
        $device->active = false;
        $device->update();
    }

    public function deleteOne($id){
        $device = Device::find($id);
        $device->delete();
    }
}
