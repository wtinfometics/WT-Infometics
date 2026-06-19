<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostValidator;
use Illuminate\Support\Str;

use App\Services\PostServices;
use App\Services\CategoryServices;
use App\Helpers\PaginationHelper;

class PostController extends Controller
{
    protected $postService;
    protected $categoryService;

    // Inject Project Service using constructor
    public function __construct(PostServices $postService,CategoryServices $categoryService){
        $this->postService = $postService;
        $this->categoryService = $categoryService;
    }

    // Index Add Post Page
    public function indexAddPost(){
        try {
            //code...
            $categories=$this->categoryService->getAllCategories();
            $categoryData= $categories['data'] ?? [];
            return view('Admin.Pages.add-post',compact('categoryData'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Store post
    public function store(Request $request){
        try {
            //code...
            $validate=PostValidator::validate($request,$request->route()->getName());
            if ($validate->fails()) {
                # If Input Validation Fails
                return redirect()->back()->withErrors($validate)->withInput();
            } else {
                # If Input Validation Pass
                $postData=$validate->validated();
                $slug=Str::slug($request->post_title);
                $data=[
                    'post_title'=>$postData['post_title'],
                    'post_slug'=>$slug,
                    'category_id'=>$postData['category_id'],
                    'short_description'=>$postData['short_description'],
                    'description'=>$postData['description'],
                ];

                $metaData=[
                    'meta_title'=>$postData['meta_title'],
                    'meta_description'=>$postData['meta_description'],
                    'keywords'=>$postData['keywords'],
                ];

                $image=$postData['featured_image'];

                $savePost = $this->postService->createPost($data,$image,$metaData);
                if ($savePost['success']) {
                    return redirect('/admin/posts')->with('success', $savePost['message']);
                }
                return redirect()->back()->with('error', $savePost['message'])->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // index Post
    public function index(){
        try {
            //code...
            $posts=$this->postService->getAllPosts();
            $success = $posts['success'] ?? false;
            $message = $posts['message'] ?? '';
            $data    = $posts['data'] ?? [];
            $paginatedData = PaginationHelper::paginate($data, 2);
            return view('Admin.Pages.posts', compact('success', 'message', 'paginatedData'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Edit Post
    public function edit($post_id){
        try {
            //code...
            $posts=$this->postService->getPostData($post_id);
            $categories=$this->categoryService->getAllCategories();
            $categoryData= $categories['data'] ?? [];
            $success = $posts['success'] ?? false;
            $message = $posts['message'] ?? '';
            $data    = $posts['data'] ?? [];
            return view('Admin.Pages.add-post', compact('success', 'message', 'data','categoryData'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Update Post
    public function update(Request $request,$post_id){
        try {
            //code...
             $validate=PostValidator::validate($request,$request->route()->getName());
            if ($validate->fails()) {
                # If Input Validation Fails
                return redirect()->back()->withErrors($validate)->withInput();
            } else {
                # If Input Validation Pass
                $postData=$validate->validated();
                $slug=Str::slug($request->post_title);
                $data=[
                    'post_title'=>$postData['post_title'],
                    'post_slug'=>$slug,
                    'category_id'=>$postData['category_id'],
                    'short_description'=>$postData['short_description'],
                    'description'=>$postData['description'],
                    'status'=>$postData['status'],
                ];
                $metaData=[
                    'meta_title'=>$postData['meta_title'],
                    'meta_description'=>$postData['meta_description'],
                    'keywords'=>$postData['keywords'],
                ];
                $image=$postData['featured_image'] ?? null;
                $savePost = $this->postService->updatePost($post_id,$data,$image,$metaData);
                if ($savePost['success']) {
                    return redirect('/admin/posts')->with('success', $savePost['message']);
                }
                return redirect()->back()->with('error', $savePost['message'])->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Delete Post
    public function delete($post_id){
        try {
            //code...
            $deletePost = $this->postService->deletePost($post_id);
            $success = $deletePost['success'] ?? false;
            $message = $deletePost['message'] ?? '';
            if ($success) {
                return redirect('/admin/posts/')->with('success',$message);
            } else {
                return redirect()->back()->with('error',$message)->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }
}
