<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    //  Model Name
    protected $table="admins";                

    // Modal data
    protected $fillable=[
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
    ];

    // Primary Key
    protected$primaryKey="admin_id";
}
