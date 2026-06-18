<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialValidator extends Request
{
    public static function validate(Request $request,string $routeName,?int $id=null){
        return Validator::make(
            $request->all(),
            self::rules($routeName,$id)
        );
    }

    public static function rules(string $routeName,?int $id):array{
        return match ($routeName) {
            'testimonial.store'  => self::createRules() ,
            'testimonial.update' => self:: updateRules($id),
            default => [],
        };
    }

    public static function createRules():array{
        return [
            'name'=>'required|string',
            'rating'=>'required|numeric',
            'message'=>'required|string',
            'profile_img'=>'required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:width=500,height=500',
        ];
    }

    public static function updateRules(?int $id):array{
           return [
            'name'=>'required|string',
            'rating'=>'required|numeric',
            'message'=>'required|string',
            'profile_img'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:width=500,height=500',
        ];
    }
}
