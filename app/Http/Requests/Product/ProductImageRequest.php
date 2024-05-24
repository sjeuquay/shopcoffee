<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest
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
            'product_id' =>'required',
            'product_large_thumb' =>'required|max:200',
            'product_small_thumb' =>'required|max:200',
            'product_position' =>'required|integer|between:-2147483647,2147483647',
        ];
    }
    public function messages(): array {
        return [
            'product_id.required' => 'Product id không được để trống',
            'product_large_thumb.required' => 'Ảnh không được để trống',
            'product_large_thumb.max' => 'Ảnh vượt quá lớn yêu cầu nhỏ hơn 200KB',
            'product_small_thumb.required' => 'Ảnh không được để trống',
            'product_small_thumb.max' => 'Ảnh vượt quá lớn yêu cầu nhỏ hơn 200KB',
            'product_position.required' => 'Vị trí ảnh không được để trống',
            'product_position.integer' => 'Vị trí ảnh phải là số nguyên',
            'product_position.between' =>'Vị trí ảnh đã vượt mức tối đa và thiểu 2147483647',

        ];
    }
}
