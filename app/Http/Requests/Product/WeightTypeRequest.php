<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class WeightTypeRequest extends FormRequest
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
            'description' => ['required', 'max:20'],
        ];
    }
    public function messages(): array
    {
        return [
            'description.required'=> 'Mô tả không được để trống!',
            'description.max'=> 'Mô tả tối đa 20 kí tự!',
        ];
    }
}
