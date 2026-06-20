<?php

namespace App\Services;

use App\Models\Post;

use App\Services\ImageServices;
use App\Services\PostMetaServices;
use App\Services\PostViewServices;

class PostServices {

    protected $imageService;
    protected $postmetaService;
    protected $postViewService;
    public $folder='Posts';

    // Inject Image service using constructor
    public function __construct(ImageServices $imageService,PostMetaServices $postmetaService,PostViewServices $postViewService){
        $this->imageService = $imageService;
        $this->postmetaService = $postmetaService;
        $this->postViewService = $postViewService;
    }

     // Create New Post
    public function createPost($data,$image,$metadata){
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
            $id=$savePost->post_id;
             $this->postmetaService->addPostMeta($id,$metadata);
             $this->postViewService->addPostView($id);
            # If New Post Created
            return [
                'success'=>true,
                'message'=>'New Post Created Successfully',
                'status'=>200
            ]; 
        }
    }

    // Get All Posts
    public function getAllPosts(){
        $posts=Post::with(['postView','categories'])->latest()->get();
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
    public function updatePost($id,$data,$image,$metaData){
        $post=$this->checkPost($id);
        if (!$post['success']) {
            # if Post Exists
            return $post;
        } else {
            // dd($data);
            # if Post Exists
            $postData=$post['data'];
            if (! empty($image)) {
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
                $this->postmetaService->addPostMeta($id,$metaData);
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
    public function deletePost($id){
        $post=$this->checkPost($id);
        if (!$post['success']) {
            # if Post Exists
            return $post;
        } else {
            # if Post Exists
            $postData=$post['data'];
            $featuredImage=$postData->featured_image;
            $this->imageService->deleteFile($featuredImage);        # Delete Featured Image
            $this->postmetaService->deletePostMetaData($id);        # Delete Featured Image
            $this->postViewService->deletePostViewData($id);        # Delete Featured Image
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

    // Get Post Data
      public function getPostData($id){
        $post=Post::with('postMeta')->find($id);
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
        $fileName=$this->imageService->saveFile($image,$this->folder,$postName);
        return $fileName;
    }

    // get Post  All Data
    public function getPostDetails($post_slug){
        $post = Post::with(['categories', 'postMeta', 'postView'])->where('post_slug', $post_slug)->first();
        if (!$post) {
            # if Post Exists
            return [
                'success'=>false,
                'message'=>'This Post Not Exists',
                'status'=>404
            ];
        } else {
            # if Post Exists
            $id=$post['post_id'];
            $this->postViewService->addPostView($id);
            return [
                'success'=>true,
                'data'=>$post,
                'status'=>200
            ];
        }
    }

    // Search Post
    public function postSSearch($search){
        $posts = Post::with('categories')->where('post_title', 'LIKE', "%{$search }%")
                ->orWhere('description', 'LIKE', "%{$search }%")
                ->get();
            if (!$posts) {
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
                'data'=>$posts,
                'status'=>200
            ];
        }
    }

    // get Product By Category
    public function getPostByCategory($category_id){
        $post = Post::with('categories')->where('category_id',$category_id)->get();
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

    // Generate post Sitemap
    public function generatePostSitemap(){
      $posts = Post::select('post_slug', 'updated_at')
    ->where('status', 'published')
    ->get();
    if ($post->count()>0) {
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
