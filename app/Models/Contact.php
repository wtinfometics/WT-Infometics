<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //  Model Name
    protected $table="contacts";                

    // Modal data
    protected $primaryKey=[
        'name',
        'email',
        'subject',
        'message',
    ];

    // Primary Key
    protected$fillable="contact_id";
}
