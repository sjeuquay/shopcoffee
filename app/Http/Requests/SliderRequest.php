<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'slide_index' => 'required|integer|max:32767|min:0',
            'slide_content' => 'required|string|max:100',
            'slide_image' => 'required|max:200',
        ];
    }

    public function messages(): array
    {
        return [
            'slide_index.required' => 'Slide index không được để trống',
            'slide_index.integer' => 'Slide index không dược có chữ và ký tự',
            'slide_index.max' => 'Slide index tối đa 32767 ký tự',
            'slide_index.min' => 'Slide index tối thiểu bằng 0',
            'slide_content.required' => 'Slide content không đươcj để trống',
            'slide_content.string' => 'Slide content phải là một chuỗi',
            'slide_content.max' => 'Slide content tối đa 100 ký tự',
            'slide_image.required' => 'Ảnh không được để trống',
            'slide_image.max' => 'Ảnh tối đa 200KB',
        ];
    }
}
