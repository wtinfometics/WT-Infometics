<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialValidator extends Request
{
    public static function validate(Request $request,string $routeName){
        return Validator::make(
            $request->all(),
            self::rules($routeName)
        );
    }

    public static function rules(string $routeName):array{
        return match ($routeName) {
            'testimonial.store'  => self::createRules() ,
            'testimonial.update' => self:: updateRules(),
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

    public static function updateRules():array{
           return [
            'name'=>'required|string',
            'rating'=>'required|numeric',
            'message'=>'required|string',
            'profile_img'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:width=500,height=500',
        ];
    }
}
