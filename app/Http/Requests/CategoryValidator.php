<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryValidator 
{
     /**
     * Validate request based on route name
     */
    public static function validate(Request $request, string $routeName, ?int $id = null)
    {
        return Validator::make(
            $request->all(),
            self::rules($routeName, $id)
        );
    }

    /**
     * Route-based rule classification
     */
    private static function rules(string $routeName, ?int $id = null): array
    {
        return match ($routeName) {

            'category.store' => self::createRules(),

            'category.update' => self::updateRules($id),

            default => [],
        };
    }

    /**
     * CREATE validation rules
     */
    private static function createRules(): array
    {
        return [
            'category_name' => 'required|string|max:255|unique:categories,category_name'
        ];
    }

    /**
     * UPDATE validation rules
     */
    private static function updateRules(?int $id): array
    {
        return [
            'category_name' => 'required|string|max:255|unique:categories,category_name,' . $id,
            'status'        => 'required|in:active,inactive',
        ];
    }
//   
}
