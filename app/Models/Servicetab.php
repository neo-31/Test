<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicetab extends Model
{
    protected $table = 'servicetabs';

    protected $fillable = ['tab_title','tab_description'];

    public $timestamps = false;
}
