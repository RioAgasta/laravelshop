<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderModel;

class orderController extends Controller
{
    public function getOrder(){
        $order = orderModel::get()->load(['cartHistory']);

        return response([
            'success' => true,
            'message' => 'Data Retrieved',
            'data' => $order
        ], 200);
    }

    public function addOrder(Request $request){

        $order = orderModel::create([
            'name' => $request->name,
            'table_num' => $request->table_num,
        ], 200);

        if($order){
            return response ([
                'success' => true,
                'message' => 'Checkout Success',
                'data' => $order
            ], 200);
        } else {
            return response ([
                'success' => false,
                'message' => 'Checkout Failed',
            ], 400);
        }
    }
}
