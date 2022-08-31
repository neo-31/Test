<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['product_name','reference','product_slug','category_id','sort_description','description','product_image','product_images1','product_images2','product_images3','product_images4'];

    public $timestamps = false;
}
