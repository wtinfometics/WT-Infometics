<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    //  Model Name
    protected $table="post_meta";                

    // Modal data
    protected $fillable=[
        'post_id',
        'meta_title',
        'meta_description',
        'keywords',
    ];

    // Primary Key
    protected$primaryKey="post_meta_id";

    // Get Post Data
    public function post(){
        return $this->belongsTo(Post::class,'post_id','post_id');
    }

}
