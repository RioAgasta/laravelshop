<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartModel extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $table = "cart_models";
    protected $fillable = [
        'quantity', 'desc', 'product_id', 'order_id'
    ];

    public function productModel(){
        return $this->hasOne(productModel::class, 'id', 'product_id');
    }
}
