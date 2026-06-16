<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnquiryValidator extends Request
{
 public static function validate(Request $request,$routeName){
    return Validator::make($request->all(),
    self::rules($routeName));
 }

 public static function rules($routeName){
    return match ($routeName) {
        'enquiry.store' => self::createRules(),
         default => [],
    };
 }

 public static function createRules(){
    return [
        'name'=>'required|string',
        'email'=>'required|email',
        'phone'=>['required', 'regex:/^\+?[0-9]{7,15}$/'],
        'company_name'=>'required|string',
        'service_name'=>'required|string',
        'message'=>'required|string',
    ];
 }
}
