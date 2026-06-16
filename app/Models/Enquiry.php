<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    //  Model Name
    protected $table="enquiries";                

    // Modal data
    protected $fillable=[
        'name',
        'email',
        'phone',
        'company_name',
        'service_name',
        'message',
    ];

    // Primary Key
    protected$primaryKey="enquiry_id";
}
