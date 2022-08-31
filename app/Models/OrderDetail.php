<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';

    protected $fillable = ['order_id','product_id','order_date','order_time','quantity','price_for_one','total_price','created_by'];

    public $timestamps = false;
}
