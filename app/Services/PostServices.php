<?php

namespace App\Services;

use App\Models\Post;

use App\Services\ImageServices;

class PostServices {

    protected $imageService;
    protected $folder='Posts';

    // Inject Image service using constructor
    public function __construct(ImageServices $imageService){
        $this->imageService = $imageService;
    }

     // Create New Post
    public function createPost($data,$image){
        $fileName=$this->checkImage($data,$image);          #  Save The Featured Image
        $data['featured_image']=$fileName;
        $savePost=Post::create($data);
        if (!$savePost) {
            # If Post Not Created
            return [
                'success'=>false,
                'message'=>' Unable To Create The Post',
                'status'=>400
            ]; 
        } else {
            # If New Post Created
            return [
                'success'=>true,
                'message'=>'New Post Created Successfully',
                'status'=>200
            ]; 
        }
    }

    // Get All Posts
    public function getAllPosts($data){
        $posts=Post::with('postView')->latest()->get();
        if (!$posts->count()>0) {
            # If Posts Empty
            return [
                'success'=>false,
                'message'=>'Posts Empty',
                'status'=>400
            ]; 
        } else {
            # If New Posts Exists
            return [
                'success'=>true,
                'data'=>$posts,
                'status'=>200
            ]; 
        }
    }

    // Get Post
    public function getPost($id){
        return $this->checkPost($id);
    }

    // Update Post
    public function updatePost($id,$data,$image){
        $post=$this->checkPost($id);
        if (!$post['success']) {
            # if Post Exists
            return $post;
        } else {
            # if Post Exists
            $postData=$post['data'];
            if ($image) {
                # If Image Exists
                $featuredImage=$postData->featured_image;
                $this->imageService->deleteFile($featuredImage);        # Delete the Existing Featured Image
                $fileName=$this->checkImage($data,$image);              # Save Featured Image
                $data['featured_image']=$fileName;
            }
            $updatePost=$postData->update($data);
            if (!$updatePost) {
                # If Post Not Updated
                return [
                    'success'=>false,
                    'message'=>'Post Not Updated',
                    'status'=>400
                ];
            } else {
                # If Post Is Updated
                return [
                    'success'=>true,
                    'message'=>'Post Updated Successfully',
                    'status'=>200
                ];
            }
        }
    }

    // Delete  Post
    public function deletePost($data){
        $post=$this->checkPost($id);
        if (!$post['success']) {
            # if Post Exists
            return $post;
        } else {
            # if Post Exists
            $postData=$post['data'];
            $featuredImage=$postData->featured_image;
            $this->imageService->deleteFile($featuredImage);        # Delete Featured Image
            $deletePost=$postData->delete();
            if (!$deletePost) {
                # If Post Not Deleted
                return [
                    'success'=>false,
                    'message'=>'Post Not Deleted',
                    'status'=>400
                ];
            } else {
                # If Post Is Deleted
                return [
                    'success'=>true,
                    'message'=>'Post Deleted Successfully',
                    'status'=>200
                ];
            }
        }
    }

    // Check Post
    public function checkPost($id){
        $post=Post::find($id);
        if (!$post) {
            # if Post Exists
            return [
                'success'=>false,
                'message'=>'This Post Not Exists',
                'status'=>404
            ];
        } else {
            # if Post Exists
            return [
                'success'=>true,
                'data'=>$post,
                'status'=>200
            ];
        }
    }
    
    // check Image
    protected function checkImage($data,$image){
        $postName=$data['post_title'];
        $fileName=$this->imageService->saveFile($image,$folder,$postName);
        return $fileName;
    }

    // get Post  All Data
    public function getPostDetails($id){
        $post-Post::with(['categories','postMeta','postView'])->find($id);
        if (!$post) {
            # if Post Exists
            return [
                'success'=>false,
                'message'=>'This Post Not Exists',
                'status'=>404
            ];
        } else {
            # if Post Exists
            return [
                'success'=>true,
                'data'=>$post,
                'status'=>200
            ];
        }
    }
}
