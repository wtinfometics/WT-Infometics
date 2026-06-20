<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\PostServices;

class HomeController extends Controller
{
    protected $postService;

    // Inject Project Service using constructor
    public function __construct(PostServices $postService){
        $this->postService = $postService;
    }

    // Index Home Page
    public function index(){
        try {
            //code...
            $posts=$this->postService->getAllPosts();
            $data = $posts['data'] ?? [];
            return view('User.index', compact('data'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // generate Sitemap
    public function generateSiteMap(){
      
            //code...
            $posts=$this->postService->getAllPosts();
            $postData=$posts['data']??  [];
             return response()
            ->view('User.sitemap', compact('postData'))
            ->header('Content-Type', 'application/xml');
    
       
    }
}
