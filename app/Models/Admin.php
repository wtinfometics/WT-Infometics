<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //  Model Name
    protected $table="admins";                

    // Modal data
    protected $primaryKey=[
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
    ];

    // Primary Key
    protected$fillable="admin_id";
}
