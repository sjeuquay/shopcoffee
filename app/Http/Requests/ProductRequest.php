<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required',
            'is_active' => 'required',
            'quantity_available' => 'required|numeric',
            'sku' => 'required|max:50',
            'name' => 'required|max:50',
            'url_key' => 'required|max:200',
            'description' => 'required|max:65535',
            'short_description' => 'required|max:250',
            'meta_description' => 'required|max:250',
            'unit_price' => 'required|numeric',
            'is_category_visible' => 'numeric',
            'is_category_searchable' => 'numeric',
            'internal_image_path' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'is_in_stock' => 'numeric',
            'modified_date' => 'nullable|date_format:Y-m-d H:i:s',
            'is_new_from_date' => 'nullable|date',
            'is_new_to_date' => 'nullable|date',
        ];
    }
    public function messages(): array
    {
        return [
            'category_id.required' => 'Vui lòng chọn danh mục',
            'is_active.required' => 'Vui lòng chọn trạng thái',
            'quantity_available.required' => 'Vui lòng nhập số lượng có sẵn',
            'quantity_available.numeric' => 'Số lượng phải là số',
            'sku.required' => 'Vui lòng nhập SKU',
            'sku.max' => 'SKU không được vượt quá 50 ký tự',
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'name.max' => 'Tên sản phẩm không được vượt quá 50 ký tự',
            'url_key.required' => 'Vui lòng nhập URL key',
            'url_key.max' => 'URL key không được vượt quá 200 ký tự',
            'description.required' => 'Vui lòng nhập mô tả',
            'description.max' => 'Mô tả không được vượt quá 65535 ký tự',
            'short_description.required' => 'Vui lòng nhập mô tả ngắn',
            'short_description.max' => 'Mô tả ngắn không được vượt quá 250 ký tự',
            'meta_description.required' => 'Vui lòng nhập mô tả meta',
            'meta_description.max' => 'Mô tả meta không được vượt quá 250 ký tự',
            'unit_price.required' => 'Vui lòng nhập giá sản phẩm',
            'unit_price.numeric' => 'Giá sản phẩm phải là số',
            'is_category_visible.numeric' => 'Trường này phải là số',
            'is_category_searchable.numeric' => 'Trường này phải là số',
            'internal_image_path.required' => 'Vui lòng chọn một hình ảnh.',
            'internal_image_path.image' => 'Tập tin phải là hình ảnh.',
            'internal_image_path.mimes' => 'Định dạng của hình ảnh phải là jpeg, png, jpg, gif hoặc svg.',
        ];
    }
}
