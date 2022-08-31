<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturers extends Model
{
    protected $table = 'manufacturers';

    protected $fillable = ['manufacturer_name','manufacturer_assign'];

    public $timestamps = false;
}
