<?php

namespace App\Http\Requests\Backend;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:200'],
            'thumb_image' => ['nullable', 'file', 'image', 'max:2048'],
            'shop_id' => ['required'],
            'category_id' => ['required'],
            'sub_category_id' => ['nullable'],
            'child_category_id' => ['nullable'],
            'brand_id' => ['required'],
            'sku' => ['nullable'],
            'price' => ['required'],
            'sale_price' => ['nullable'],
            'sale_start' => ['nullable'],
            'sale_end' => ['nullable'],
            'quantity' => ['required'],
            'short_description' => ['nullable', 'max:250'],
            'long_description' => ['nullable', 'max:500'],
            'video_link' => ['nullable'],
            'is_top' => ['nullable'],
            'is_new' => ['nullable'],
            'is_best' => ['nullable'],
            'is_featured' => ['nullable'],
            'is_approved' => ['required'],
            'status' => ['nullable'],
            'seo_title' => ['nullable', 'max:200'],
            'seo_description' => ['nullable', 'max:250'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}
