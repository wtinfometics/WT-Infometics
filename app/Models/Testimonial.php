<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //  Model Name
    protected $table="testimonials";                

    // Modal data
    protected $primaryKey=[
        'name',
        'rating',
        'profile',
        'message',
    ];

    // Primary Key
    protected$fillable="testimonial_id";
}
