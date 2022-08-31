<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCharges extends Model
{
    protected $table = 'shipping_charges';

    protected $fillable = ['country_id', 'state_id', 'parcel_type', 'shipping_rate_under', 'shipping_rate_over', 'country_type', 'delivery_next_day', 'delivery_days_2_3', 'delivery_days_3_4', 'delivery_days_4_5', 'delivery_price', 'delivery_time'];

    public $timestamps = false;
}
