<?php

namespace App\Services;

use App\Models\PostView;

class PostViewServices {

    // aAdd Or Update Post View
    public function addPostView($id){
      return PostView::updateOrCreate(
        ['post_id' => $id],
        []
    )->increment('view');
    }

    //Delete Post View
    public function deletePostViewData($id){
        return PostView::where('post_id',$id)->delete();
    }

}