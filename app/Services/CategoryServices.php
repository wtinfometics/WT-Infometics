<?php

namespace App\Services;

use App\Models\Category;

class CategoryServices {

    // Create New Category
    public function createCategory($data){
        $saveCategory=Category::create($data);
        if (!$saveCategory) {
            # If Category Not Created
            return [
                'success'=>false,
                'message'=>' Unable To Create The Category',
                'status'=>400
            ]; 
        } else {
            # If New Category Created
            return [
                'success'=>true,
                'message'=>'New Category Created Successfully',
                'status'=>200
            ]; 
        }
    }

    // Get All Categories
    public function getAllCategories($data){
        $categories=Category::latest()->get();
        if (!$categories->count()>0) {
            # If Categories Empty
            return [
                'success'=>false,
                'message'=>'Categories Empty',
                'status'=>400
            ]; 
        } else {
            # If New Categories Exists
            return [
                'success'=>true,
                'data'=>$categories,
                'status'=>200
            ]; 
        }
    }

    // Get Category
    public function getCategory($id){
        return $this->checkCategory($id);
    }

    // Update Category
    public function updateCategory($id){
        $category=$this->checkCategory($id);
        if (!$category['success']) {
            # if Category Exists
            return $category;
        } else {
            # if Category Exists
            $categoryData=$category['data'];
            $updateCategory=$categoryData->update($data);
            if (!$updateCategory) {
                # If Category Not Updated
                return [
                    'success'=>false,
                    'message'=>'Category Not Updated',
                    'status'=>400
                ];
            } else {
                # If Category Is Updated
                return [
                    'success'=>true,
                    'message'=>'Category Updated Successfully',
                    'status'=>200
                ];
            }
        }
    }

    // Delete  Category
    public function deleteCategory($data){
        $category=$this->checkCategory($id);
        if (!$category['success']) {
            # if Category Exists
            return $category;
        } else {
            # if Category Exists
            $categoryData=$category['data'];
            $deleteCategory=$categoryData->delete();
            if (!$deleteCategory) {
                # If Category Not Deleted
                return [
                    'success'=>false,
                    'message'=>'Category Not Deleted',
                    'status'=>400
                ];
            } else {
                # If Category Is Deleted
                return [
                    'success'=>true,
                    'message'=>'Category Deleted Successfully',
                    'status'=>200
                ];
            }
        }
    }

    // Check Category
    public function checkCategory($id){
        $category=Category::find($id);
        if (!$category) {
            # if Category Exists
            return [
                'success'=>false,
                'message'=>'This Category Not Exists',
                'status'=>404
            ];
        } else {
            # if Category Exists
            return [
                'success'=>true,
                'data'=>$category,
                'status'=>200
            ];
        }
    }

    // Get  Posts By Category
    public function postsByCategories(){
        $posts=Category::with('posts')->latest()->get();
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

     // Get  Projects By Category
    public function projectByCategories(){
        $projects=Category::with('projects')->latest()->get();
        if (!$projects->count()>0) {
            # If Projects Empty
            return [
                'success'=>false,
                'message'=>'Projects Empty',
                'status'=>400
            ]; 
        } else {
            # If New Projects Exists
            return [
                'success'=>true,
                'data'=>$projects,
                'status'=>200
            ]; 
        }
    } 
}
