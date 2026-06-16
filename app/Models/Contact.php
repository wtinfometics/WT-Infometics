<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //  Model Name
    protected $table="contacts";                

    // Modal data
    protected $fillable=[
        'name',
        'email',
        'subject',
        'message',
    ];

    // Primary Key
    protected$primaryKey="contact_id";
}
