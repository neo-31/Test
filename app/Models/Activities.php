<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    protected $table = 'activities';

    protected $fillable = ['user_id','activity_type','subject_id','subject_type','ip_address','user_device','user_location'];

    public $timestamps = false;
}
