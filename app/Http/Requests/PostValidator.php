<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostValidator extends Request
{ 
     public static function validate(Request $request,string $routeName,?int $id=null){
        return Validator::make(
            $request->all(),
            self::rules($routeName,$id)
        );
    }

    public static function rules(string $routeName):array{
        return match ($routeName) {
            'post.store'  => self::createRules() ,
            'post.update' => self:: updateRules($id),
            'blogs.search' => self:: searchRules(),
            default => [],
        };
    }

    public static function createRules():array{
        return [
            'post_title'=>'required|string',
            'category_id' => 'required|exists:categories,category_id',
            'short_description'=>'required|String',
            'description'=>'required|String',
            'featured_image'=>'required|image|mimes:jpg,jpeg,png,webp|max:1024|dimensions:width=500,height=250',
            'meta_title' => 'required|string',
            'meta_description'=>'required|string',
            'keywords'=>'required|string',
            'status'=>'nullable|string'
        ];
    }

    public static function updateRules():array{
           return [
            'post_title'=>'required|string',
            'category_id' => 'required|exists:categories,category_id',
            'short_description'=>'required|String',
            'description'=>'required|String',
            'featured_image'=>'image|mimes:jpg,jpeg,png,webp|max:1024|dimensions:width=500,height=250',
            'meta_title' => 'required|string',
            'meta_description'=>'required|string',
            'keywords'=>'required|string',
            'status'=>'required|string'
        ];
    }

    public static function searchRules():array{
           return [
            'search_name'=>'required|string'
        ];
    }
}
