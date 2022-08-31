<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable = ['blog_title','category_id','short_description','long_description','features_image','inner_image'];

    public $timestamps = false;
}
