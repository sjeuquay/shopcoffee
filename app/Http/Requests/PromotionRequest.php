<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest
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
            'code' =>'max:10|unique:promotion',
            'minium_eligible_amount' => 'required|numeric',
            'max_counts_allow' => 'integer|between:-2147483647,2147483647',
            'use_percentage' => 'numeric',
            'use_ammount' => 'numeric',
            'cap_percentage' => 'required|numeric',
            'cap_amount' => 'required|numeric',
            'expiration_date' => 'required|date',
        ];
    }
    public function messages(): array
    {
        return [
            'code.max' => 'Mã code tối da 10 ký tự',
            'code.unique' => 'Mã code đã tồn tại',
            'minium_eligible_amount.required' => 'Bạn chưa nhập dữ liệu',
            'minium_eligible_amount.numeric' => 'Tiền tối thiểu cho phép phải là kiểu số',
            'max_counts_allow.integer' => 'Số lượng tối đa cho phép phải là kiểu số',
            'max_counts_allow.between' =>'Số lượng tối đa cho phép đã vượt mức tối đa và thiểu 2147483647',
            'use_percentage.numeric' => 'Phần trăm sử dụng phải là kiểu số',
            'use_ammount.numeric' => 'Số lượng sử dụng phải là kiểu số',
            'cap_percentage.required' => 'Bạn chưa nhập dữ liệu',
            'cap_percentage.numeric' => 'Phần trăm giới hạn phải là kiểu số',
            'cap_amount.required' => 'Bạn chưa nhập dữ liệu',
            'cap_amount.numeric' => 'Số lượng giới hạn phải là kiểu số',
            'expiration_date.required' => 'Bạn chưa nhập dữ liệu',
        ];
    }
}
