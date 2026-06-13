<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //  Model Name
    protected $table="projects";                

    // Modal data
    protected $primaryKey=[
        'project_name',
        'category_id',
        'start_date',
        'end_date',
        'description',
        'contact_person',
        'designation',
        'organization',
        'phone',
        'email',
        'address',
        'payment_type',
        'amount',
        'status',
    ];

    // Primary Key
    protected$fillable="project_id";

    // Get Categories Data
    public function categories(){
        return $this->belongsTo(Category::class,'category_id','category_id');
    }
}
