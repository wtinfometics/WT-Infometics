<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    //  Model Name
    protected $table="post_views";                

    // Modal data
    protected $fillable=[
        'post_id',
        'view',
    ];

    // Primary Key
    protected$primaryKey="post_view_id";

    // Get Post Data
    public function post(){
        return $this->belongsTo(Post::class,'post_id','post_id');
    }
    
}
