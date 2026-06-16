<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
      //  Model Name
    protected $table="otps";                

    // Modal data
    protected $fillable=[
        'otp',
        'email',
        'expires_at',
    ];

    // Primary Key
    protected$primaryKey="otp_id";
}
