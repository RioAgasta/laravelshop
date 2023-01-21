<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartModel extends Model
{
    use HasFactory;
    protected $table = "cart_models";
    protected $fillable = [
        'quantity', 'desc', 'product_id'
    ];

    public function productModel(){
        return $this->hasOne(productModel::class, 'id', 'product_id');
    }
}
