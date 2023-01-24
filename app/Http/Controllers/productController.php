<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productModel;

class productController extends Controller
{
    //
    public function addProduct(Request $request){
        $image_path = $request->file('image')->store('image', 'public');

        $products = productModel::create([
            'code' => $request->code,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $image_path,
            'stock' => $request->stock,
        ]);

        if($products){
            return response([
                'success' => true,
                'message' => 'Product Successfully Added',
            ], 200);
        } else {
            return response([
                'success' => false,
                'message' => 'Failed to Add Product'
            ], 400);
        }
    }

    public function getProduct(){
        $products = productModel::get();
        return response([
            'success' => true,
            'message' => 'Products Retrieved',
            'data' => $products
        ], 200);
    }

    public function getProductById($id){
        $products = productModel::whereId($id)->first();
        if($products){
            return response([
                'success' => true,
                'message' => 'Product Data Get',
                'data' => $products
            ], 200);
        } else {
            return response([
                'success' => false,
                'message' => 'Product Not Found',
                'data' => ''
            ], 404);
        }
    }

    public function editProduct(Request $request, $id){
        $products = productModel::findOrFail($id);

        if($products){
            $products->update([
                'code' => $request->code,
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
            ]);

            return response([
                'success' => true,
                'message' => 'Product Updated',
                'data' => $products
            ]);
        } else {
            return response([
                'success' => false,
                'message' => 'Product Not Found'
            ], 404);
        }
    }

    public function delProduct($id){
        $products = productModel::find($id);
        if($products){
            $file = str_replace('\\', '/', public_path('storage/')).$products->image;
            unlink($file);
            $products->delete();

            return response ([
                'message' => 'Product Deleted',
                'code' => 200
            ]);
        } else {
            return response ([
                'message' => 'Product Not Found',
                'code' => 400
            ]);
        }
    }
}
