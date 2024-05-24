<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRelatedRequest extends FormRequest
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
            'related_id_list' => ['max:250'],
            'recommend_id_list' => ['max:250'],
        ];
    }
    public function messages(): array
    {
        return [
            'related_id_list.max' => 'RELATED_ID_LIST tối đa 250 ký tự',
            'recommend_id_list.max' => 'RECOMMEND_ID_LIST tối đa 250 ký tự',
        ];
    }
}
