<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryValidator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

use App\Services\CategoryServices;

class CategoryController extends Controller
{
    protected $categoryService;

    // Inject Contact Service using constructor
    public function __construct(CategoryServices $categoryService){
        $this->categoryService = $categoryService;
    }

    // Index Add Category Page
    public function createCategory(){
        return view('Admin.Pages.add-category');
    }

    // Store New Category
    public function store(Request  $request){
       try {
            //code...
            $validate = CategoryValidator::validate($request,$request->route()->getName());
            if ($validate->fails()) {
                # If Validation Fails
                return redirect()->back()->withErrors($validate)->withInput();
            } else {
                # If Validation Fails
                $data=$validate->validated();
                $category_slug = Str::slug($data['category_name']);
                $data['slug']=$category_slug;
                $saveCategory = $this->categoryService->createCategory($data);
                if ($saveCategory['success']) {
                    return redirect('/admin/categories')->with('success', $saveCategory['message']);
                }
                return redirect()->back()->with('error', $saveCategory['message'])->withInput();
            }
       } catch (\Throwable $th) {
        //throw $th;
         return redirect()->back()->with('error', $th->getMessage())->withInput();
       }
    }

    // Index categories
    public function index(){
        try {
            //code...
            $categories=$this->categoryService->getAllCategories();
            $success = $categories['success'] ?? false;
            $message = $categories['message'] ?? '';
            $data    = $categories['data'] ?? [];
            return view('Admin.Pages.categories', compact('success', 'message', 'data'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Edit Category
    public function edit($category_id){
        try {
            //code...
            $category=$this->categoryService->getCategory($category_id);
            $success = $category['success'] ?? false;
            $message = $category['message'] ?? '';
            $data    = $category['data'] ?? [];
            return view('Admin.Pages.add-category', compact('success', 'message', 'data'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // Update Category
    public function update(Request $request,$category_id){
        try {
            //code...
            $validate = CategoryValidator::validate($request,$request->route()->getName());
            if ($validate->fails()) {
                # If Validation Fails
                return redirect()->back()->withErrors($validate)->withInput();
            } else {
                # If Validation Fails
                $data=$validate->validated();
                $category_slug = Str::slug($data['category_name']);
                $data['slug']=$category_slug;
                $updateCategory = $this->categoryService->updateCategory($category_id,$data);
                if ($updateCategory['success']) {
                    return redirect('/admin/categories')->with('success', $updateCategory['message']);
                }
                return redirect()->back()->with('error', $updateCategory['message'])->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
           return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    // delete Category
    public function delete($category_id){
        try {
            //code...
            $deleteCategory = $this->categoryService->deleteCategory($category_id);
            $success = $deleteCategory['success'] ?? false;
            $message = $deleteCategory['message'] ?? '';
            if ($success) {
                return redirect('/admin/categories/')->with('success',$message);
            } else {
                return redirect()->back()->with('error',$message)->withInput();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

}