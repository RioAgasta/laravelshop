<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderModel extends Model
{
    use HasFactory;
    protected $table = 'order_models';

    protected $fillable = [
        'name', 'table_num'
    ];

    public function cartHistory(){
        return $this->hasMany(cartHistory::class, 'order_id', 'id');
    }
}
