<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminValidator extends Request
{
     /**
     * Validate request based on route name
     */
    public static function validate(Request $request, string $routeName)
    {
        return Validator::make(
            $request->all(),
            self::rules($routeName)
        );
    }

    /**
     * Route-based rule classification
     */
    private static function rules(string $routeName): array
    {
        return match ($routeName) {

            'admin.register' => self::signUpRules(),
            'admin.login' => self::loginRules(),
            'admin.forget' => self::forgetPasswordRules(),
            'admin.verify' => self::verifyOTPRules(),
            'admin.reset' => self::resetPasswordRules(),
            'admin.update' => self::updateAdminRules(),
            'admin.updatePassword' => self::updatePasswordRules(),

            default => [],
        };
    }

    private static function signUpRules(): array
    {
        return [
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required|numeric|digits:10',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'
            ],
            'confirm_password' => [
                'required',
                'same:password'
            ],
        ];
    }


     private static function loginRules(): array
    {
        return [
            'email'=>'required|email',
            'password'=>'required|string'
        ];
    }


     private static function forgetPasswordRules(): array
    {
        return [
            'email'=>'required|email',
        ];
    }


     private static function verifyOTPRules(): array
    {
        return [
           'otp'=>'required|numeric|digits:6'
        ];
    }


     private static function resetPasswordRules(): array
    {
        return [
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'
            ],
            'confirm_password' => [
                'required',
                'same:password'
            ],
        ];
    }


     private static function updateAdminRules(): array
    {
        return [
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required|numeric|digits:10',
        ];
    }
 

     private static function updatePasswordRules(): array
    {
        return [
                 'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'
            ],
            'confirm_password' => [
                'required',
                'same:password'
            ],
        ];
    }
}
 
