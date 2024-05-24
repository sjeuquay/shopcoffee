<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class IngredientRequest extends FormRequest
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
            'product_id' => ['required'],
            'option_1' => ['required','max:20'],
            'option_2' => ['required','max:20','different:option_1'],
            'option_3' => ['required','max:20','different:option_1', 'different:option_2'],
            'unit_price1' => ['required','numeric'],
            'unit_price2' => ['required','numeric'],
            'unit_price3' => ['required','numeric'],
        ];
    }
    public function messages(): array
    {
        return [
            'product_id.required'=> 'Product id chưa được chọn',
            'option_1.required'=> 'Lựa chọn 1 còn để trống',
            'option_2.required'=> 'Lựa chọn 2 còn để trống',
            'option_3.required'=> 'Lựa chọn 3 còn để trống',
            'option_1.max'=> 'Lựa chọn 1 tối đa 20 ký tự',
            'option_2.max'=> 'Lựa chọn 2 tối đa 20 ký tự',
            'option_3.max'=> 'Lựa chọn 3 tối đa 20 ký tự',
            'option_2.different'=> 'Lựa chọn 2 đã trùng với lựa chọn 1',
            'option_3.different'=> 'Lựa chọn 3 phải khác lựa chọn 1 và lựa chọn 2',
            
            'unit_price1.required'=> 'Giá 1 còn để trống',
            'unit_price1.numeric'=> 'Giá 1 phải là số',
            'unit_price2.required'=> 'Giá 2 còn để trống',
            'unit_price2.numeric'=> 'Giá 1 phải là số',
            'unit_price3.required'=> 'Giá 3 còn để trống',
            'unit_price3.numeric'=> 'Giá 1 phải là số',
        ];
    }
}
