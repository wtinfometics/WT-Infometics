<?php

namespace App\Services;

use App\Models\PostMeta;

class PostMetaServices {
    
    // aAdd Or Update Post View
    public function addPostMeta($id,$data){
      return PostMeta::updateOrCreate(
        ['post_id' => $id],
        $data
    );
    }

    //Delete Post View
    public function deletePostMetaData($id){
        return PostMeta::where('post_id',$id)->delete();
    }

}