<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectValidator extends Request
{
    public static function validate(Request $request,string $routeName){
        return Validator::make(
            $request->all(),
            self::rules($routeName)
        );
    }

    public static function rules(string $routeName):array{
        return match ($routeName) {
            'project.store'  => self::createRules() ,
            'project.update' => self:: updateRules(),
            default => [],
        };
    }

    public static function createRules():array{
        return [
            'project_name'=>'required|string',
            'category_id' => 'required|exists:categories,category_id',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'description'=>'required|string',
            'contact_person' => 'required|string',
            'designation'=>'required|string',
            'organization'=>'required|string',
            'phone'=>'required|numeric|digits_between:9,13',
            'email'=>'required|email',
            'address'=>'required|string',
            'payment_type'=>'required|string',
            'amount' => 'required|numeric',
        ];
    }

    public static function updateRules():array{
           return [
            'project_name'=>'required|string',
            'category_id' => 'required|exists:categories,category_id',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'description'=>'required|string',
            'contact_person' => 'required|string',
            'designation'=>'required|string',
            'organization'=>'required|string',
            'phone'=>'required|numeric|digits_between:9,13',
            'email'=>'required|email',
            'address'=>'required|string',
            'payment_type'=>'required|string',
            'amount' => 'required|numeric',
            'status'=>'required|string'
        ];
    }
}
