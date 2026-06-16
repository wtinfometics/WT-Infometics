<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //  Model Name
    protected $table="testimonials";                

    // Modal data
    protected $fillable=[
        'name',
        'rating',
        'profile',
        'message',
    ];

    // Primary Key
    protected$primaryKey="testimonial_id";
}
