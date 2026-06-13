<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //  Model Name
    protected $table="categories";                

    // Modal data
    protected $primaryKey=[
        'category_name',
        'slug',
        'status',
    ];

    // Primary Key
    protected$fillable="category_id";

    // Get Posts Data
    public function posts(){
        return $this->hasOne(Post::class,'category_id','category_id');
    }

     // Get Projects Data
    public function Projects(){
        return $this->hasOne(Project::class,'category_id','category_id');
    }

}
