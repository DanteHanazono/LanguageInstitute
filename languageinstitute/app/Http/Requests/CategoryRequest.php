<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' =>  [
                'required',
                'string',
                'max:100',
                Rule::unique(table: 'categories', column: 'name')
                    ->ignore(id: request('category'), idColumn: 'id')
            ],
        ];
    }
    public function  messages(): array
    {
        return [
            'name.unique' =>  __("This category name has already been taken.")
        ];
    }
}
