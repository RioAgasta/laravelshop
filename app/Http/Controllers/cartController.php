<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cartModel;
use App\Models\productModel;
class cartController extends Controller
{
    //
    public function getCart(){
        $cart = cartModel::latest()->get()->load(['productModel']);

        // $cart=cartModel::select('cart_models.*')->join('product_models','product_models.id','=','cart_models.product_id')->get();
        // $cart=productModel::select('product_models.*')->join('cart_models','cart_models.product_id','=','product_models.id')->get();
        // $cart = cartModel::join('product_models', 'product_models.id', '=', 'cart_models.product_id')->select('cart_models.*','product_models.*')->get()->load(['productModel']);

        return response([
            'success' => true,
            'message' => 'cart Retrieved',
            'data' => $cart
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

    public function editCart(Request $request, $id){
        $cart = cartModel::findOrFail($id);

        if($cart){
            $cart->update([
                'quantity' => $request->quantity
            ]);

            return response([
                'success' => true,
                'message' => 'Product Updated',
                'data' => $cart
            ]);
        } else {
            return response([
                'success' => false,
                'message' => 'Product Not Found'
            ], 404);
        }
    }

    public function delCart($id){
        $cart = cartModel::find($id);
        if($cart){
            $cart->delete();
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
