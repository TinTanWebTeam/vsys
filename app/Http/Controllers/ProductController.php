<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;

class ProductController extends Controller
{
    /* API METHOD */
    public function getAll(){
        $arr_datas = $this->all();
        return response()->json([
            'products'     => $arr_datas['products'],
            'productTypes' => $arr_datas['productTypes']
        ], 200);
    }

    public function getOne(Request $request){
        $id = 0;
        $product = $this->one(0);
        return response()->json([
            'product' => $product
        ], 200);
    }

    public function postAddOne(Request $request){
        $this->addOne($request->input('product'));
        $arr_datas = $this->all();
        return response()->json([
            'products'     => $arr_datas['products'],
            'productTypes' => $arr_datas['productTypes']
        ], 200);
    }

    public function putUpdateOne(Request $request){
        $this->updateOne($request->input('product'));
        $arr_datas = $this->all();
        return response()->json([
            'products'     => $arr_datas['products'],
            'productTypes' => $arr_datas['productTypes']
        ], 200);
    }

    public function patchDeactiveOne(Request $request){
        $id = $request->input('id');
        $this->deactiveOne($id);
        $arr_datas = $this->all();
        return response()->json([
            'products'     => $arr_datas['products'],
            'productTypes' => $arr_datas['productTypes']
        ], 200);
    }

    public function deleteDeleteOne(Request $request){
        $id = $request->input('id');
        $this->deleteOne($id);
        $arr_datas = $this->all();
        return response()->json([
            'products'     => $arr_datas['products'],
            'productTypes' => $arr_datas['productTypes']
        ], 200);
    }

    /* LOGIC METHOD */
    public function all(){
        $products = Product::where('products.active', true)
            ->leftJoin('product_types', 'product_types.id', '=', 'products.product_type_id')
            ->select('products.*', 'product_types.name as product_type_name')
            ->get();
        $productTypes = ProductType::where('product_types.active', true)->get();
        return [
            'products'     => $products,
            'productTypes' => $productTypes
        ];
    }

    public function one($id){
        $product = Product::find($id);
        return $product;
    }

    public function addOne($data){
        if($data['name'] != '' && $data['product_type_id'] != ''){
            $product = new Product;
            $product->name = $data['name'];
            $product->description = $data['description'];
            $product->active = true;
            $product->product_type_id = $data['product_type_id'];
            $product->save();
        }
    }

    public function updateOne($data){
        if($data['name'] != '' && $data['product_type_id'] != ''){
            $product = Product::find($data['id']);
            $product->name = $data['name'];
            $product->description = $data['description'];
            $product->active = true;
            $product->product_type_id = $data['product_type_id'];
            $product->update();
        }
    }

    public function deactiveOne($id){
        $product = Product::find($id);
        $product->active = false;
        $product->update();
    }

    public function deleteOne($id){
        $product = Product::find($id);
        $product->delete();
    }

}
