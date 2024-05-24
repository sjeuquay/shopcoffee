<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StatusRequest extends FormRequest
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
            'description' => [
                'required',
                'max:50',
            ],
            'status_code' => 'required|max:99|unique:status,status_code'
        ];
    }

    public function messages(): array
    {
        return [
            'description.required' => 'Mô tả không được để trống',
            'description.max' => 'Độ dài tối đa 50 ký tự',
            'status_code.required' => 'Code status không được để trống',
            'status_code.max' => 'Code status tối đa 99',
            'status_code.unique' => 'Code status đã tồn tại'
        ];
    }
}
