<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cartModel;
use App\Models\productModel;
class cartController extends Controller
{
    //
    public function getCart(){
        // $products = cartModel::latest()->get();
        // $products=cartModel::select('cart_models.*')->join('product_models','product_models.id','=','cart_models.product_id')->get();
        // $products=productModel::select('product_models.*')->join('cart_models','cart_models.product_id','=','product_models.id')->get();
        
        $products = cartModel::join('product_models', 'product_models.id', '=', 'cart_models.product_id')->select('cart_models.*','product_models.*')->get();
        return response([
            'success' => true,
            'message' => 'Products Retrieved',
            'data' => $products
        ], 200);
    }

    public function addCart(Request $request){
        $cart = cartModel::create([
            'quantity' => $request->quantity,
            'desc' => $request->desc,
            'product_id' => $request->product_id,
        ], 200);

        if($cart){
            return response ([
                'success' => true,
                'message' => 'Product Added to Cart',
            ], 200);
        } else {
            return response ([
                'success' => false,
                'message' => 'Failed to Add Product',
            ], 400);
        }
    }
}
