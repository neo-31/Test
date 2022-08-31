<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable = ['guest_user_id','user_id','product_id','quantity','cart_date','cart_time','created_by'];

    public $timestamps = false;
}
