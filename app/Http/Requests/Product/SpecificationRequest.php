<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product\ProductSpecification;

class SpecificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            ProductSpecification::length => 'required|numeric',
            ProductSpecification::width => 'required|numeric',
            ProductSpecification::height => 'numeric',
            ProductSpecification::weight_id => 'numeric',
            ProductSpecification::actual_weight => 'numeric',
            ProductSpecification::size_id => 'numeric',
            ProductSpecification::actual_size => 'numeric',
            ProductSpecification::specification_price => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            '',
        ];
    }
}
