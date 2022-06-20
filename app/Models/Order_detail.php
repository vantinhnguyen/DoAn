<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','product_detail_id','quantity','price'];

    public function product_detail(){
        return $this->belongsTo(Product_detail::class,'product_detail_id');
    }
}
