<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;

class CollectionController extends Controller
{
    /* API METHOD */
    public function getAll(){
        $arr_datas = $this->all();
        return response()->json([
            'collections'     => $arr_datas['collections']
        ], 200);
    }

    public function getOne(Request $request){
        $id = 0;
        $collection = $this->one(0);
        return response()->json([
            'collection' => $collection
        ], 200);
    }

    public function postAddOne(Request $request){
        $this->addOne($request->input('collection'));
        $arr_datas = $this->all();
        return response()->json([
            'collections'     => $arr_datas['collections'],
        ], 200);
    }

    public function putUpdateOne(Request $request){
        $this->updateOne($request->input('collection'));
        $arr_datas = $this->all();
        return response()->json([
            'collections'     => $arr_datas['collections']
        ], 200);
    }

    public function patchDeactiveOne(Request $request){
        $id = $request->input('id');
        $this->deactiveOne($id);
        $arr_datas = $this->all();
        return response()->json([
            'collections'     => $arr_datas['collections'],
        ], 200);
    }

    public function deleteDeleteOne(Request $request){
        $id = $request->input('id');
        $this->deleteOne($id);
        $arr_datas = $this->all();
        return response()->json([
            'collections'     => $arr_datas['collections']
        ], 200);
    }

    /* LOGIC METHOD */
    public function all(){
        $collections = Collection::where('collections.active', true)->get();
        return [
            'collections'     => $collections,
        ];
    }

    public function one($id){
        $collection = Collection::find($id);
        return $collection;
    }

    public function addOne($data){
        if($data['name'] != '' && $data['description'] != ''){
            $collection = new Collection;
            $collection->name = $data['name'];
            $collection->description = $data['description'];
            $collection->active = true;
            $collection->save();
        }
    }

    public function updateOne($data){
        if($data['name'] != '' && $data['description'] != ''){
            $collection = Collection::find($data['id']);
            $collection->name = $data['name'];
            $collection->description = $data['description'];
            $collection->active = true;
            $collection->update();
        }
    }

    public function deactiveOne($id){
        $collection = Collection::find($id);
        $collection->active = false;
        $collection->update();
    }

    public function deleteOne($id){
        $collection = Collection::find($id);
        $collection->delete();
    }
}
