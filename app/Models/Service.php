<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = ['service_name','service_slug','tab1_description','tab2_description','tab3_description','tab1title','tab2title','tab3title','service_meta_tag','sort_description','service_meta_description','category_id','service_description','features_image','inner_image','inner_image1'];

    public $timestamps = false;
}
