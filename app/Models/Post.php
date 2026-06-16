<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //  Model Name
    protected $table="posts";                

    // Modal data
    protected $fillable=[
        'post_title',
        'post_slug',
        'category_id',
        'short_description',
        'description',
        'featured_image',
        'status',
    ];

    // Primary Key
    protected$primaryKey="post_id";

    // Get Categories Data
    public function categories(){
        return $this->belongsTo(Category::class,'category_id','category_id');
    }

    // get Post Meta Data
    public function  postMeta(){
        return $this->hasOne(PostMeta::class,'post_id','post_id');
    }

    // get Post Meta Data
    public function  postView(){
        return $this->hasOne(PostView::class,'post_id','post_id');
    }
}
