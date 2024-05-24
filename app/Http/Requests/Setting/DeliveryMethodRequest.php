<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryMethodRequest extends FormRequest
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
            'type' => 'required|between:0,32767',
            'short_description' => 'required|max:50',
            'long_description' => 'required|max:150'
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => 'Type không được để trống',
            'type.between' => 'Type tối đa 32767',
            'short_description.required' => 'short_description không được để trống',
            'short_description.max' => 'short_description tối đa 50 ký tự',
            'long_description.required' => 'long_description không được để trống',
            'long_description.max' => 'short_description tối đa 150 ký tự',
        ];
    }
}
