<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usersnote extends Model
{
    protected $table = 'users_notes';

    protected $fillable = ['user_id','user_note','is_status','is_deleted','created_by','updated_by'];

    public $timestamps = false;
}
