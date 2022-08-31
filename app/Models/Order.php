<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = ['user_id','total_qty','actual_price','coupon_id','coupon_discount','flat_rate','created_by'];

    public $timestamps = false;
}
