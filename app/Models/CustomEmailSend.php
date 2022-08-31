<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomEmailSend extends Model
{
    protected $table = 'custom_send_email';

    protected $fillable = [
        'email',
        'subject',
        'email_content',
        'created_by'
    ];

    public $timestamps = false;
}
