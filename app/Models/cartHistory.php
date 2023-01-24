<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartHistory extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "cart_histories";
    protected $fillable = [
        'quantity', 'desc', 'product_id', 'order_id'
    ];
}
