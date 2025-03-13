<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChildCategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id', 'not_in:empty'],
            'sub_category_id' => ['required', 'exists:sub_categories,id', 'not_in:empty'],
            'name' => ['required', 'string', 'max:200', Rule::unique('child_categories', 'name')->ignore($this->child_category)],
            'status' => ['required'],
        ];
    }
}
