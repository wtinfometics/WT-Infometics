<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactValidator extends Request
{
   
    public static function validate(Request $request, $routeName,){
        return Validator::make($request->all(),
        self::rules($routeName)
        );
    }

    public static function rules( $routeName){
        return match ($routeName) {
           'contact.store'  => self::createRules(),
           default => [],
        };
    }

    public static function createRules(){
        return [
            'name'=>'required|string',
            'email'=>'required|email',
            'subject'=>'required|string',
            'message'=>'required|string',
        ];
    }
  
}
