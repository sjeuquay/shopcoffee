<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        $categoryId = $this->route('category');
        return [
            'name' => ['required', 'min:6', Rule::unique('category')->ignore($categoryId),'max:20'],
            'description' => ['required', 'min:10','max:20'],
            'meta_description' => ['max:255'],
            'url_key' => ['required','max:200'],
            'image' => ['required'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên danh mục không được để trống',
            'name.min' => 'Tên danh mục tối thiểu 6 ký tự',
            'name.max' => 'Tên danh mục tối đa 20 ký tự',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'description.required' => 'Mô tả không được để trống',
            'description.min' => 'Mô tả tối thiểu 10 ký tự',
            'description.max' => 'Mô tả tối đa 20 ký tự',
            'meta_description.max' => 'Mô tả tối đa 255 ký tự',
            'url_key.required' => 'Url key không được để trống',
            'url_key.max' => 'Url key tối đa 200 ký tự',
            'image.required' => 'Ảnh không được để trống',
        ];
    }
}
