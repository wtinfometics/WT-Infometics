<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryValidator;

class CategoryController extends Controller
{
    //
    public function store(Request  $request)
    {
        $validator = CategoryValidator::validate(
            $request,
            $request->route()->getName()
        );

       $data=$validator->getData();
       $data['code']=1;
       unset($data['status']);
        dd($data);
        
    }
}
