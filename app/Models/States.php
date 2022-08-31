<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    protected $table = 'states';

    protected $fillable = ['state_name', 'country_id'];

    public $timestamps = false;
}
