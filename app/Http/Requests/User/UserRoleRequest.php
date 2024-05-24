<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRoleRequest extends FormRequest
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
            "permission_id"=> "required",
            "description"=> "required|max:50",
        ];
    }
    public function messages(): array {
        return [
            "permission_id.required"=> "Permission id chưa dc chọn",
            "permission_id.between"=> "Permission id tối đa 127",
            "description.required"=> "Mô tả chưa dc chọn",
            "description.max"=> "Mô tả tối đa 50 ký tự",
        ];
    }
}
