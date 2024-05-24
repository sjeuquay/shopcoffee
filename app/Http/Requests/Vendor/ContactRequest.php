<?php

namespace App\Http\Requests\Vendor;

use App\Models\Vendor\Contact;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            Contact::VENDOR_ID    => 'required|numeric',
            Contact::ADDRESS      => 'required|max:50',
            Contact::ADDRESS_2    => 'nullable|max:200',
            Contact::CITY         => 'required|max:50',
            Contact::PROVINCE     => 'required|max:50',
            Contact::COUNTRY      => 'required|max:10',
            Contact::EMAIL        => 'required|email',
            Contact::PHONE        => 'required|max:20',
            Contact::LONGTITUDE   => 'nullable|max:20',
            Contact::LATITUDE     => 'nullable|max:20',
            Contact::OPENING_TIME => 'nullable',
            Contact::CLOSING_TIME => 'nullable',
            Contact::IS_MOBILE    => 'required|boolean',
            Contact::IS_DEFAULT   => 'required|boolean',
            Contact::IS_BILLING   => 'nullable|boolean',
            Contact::IS_SHIPPING  => 'required|boolean',
         ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Trường :attribute là bắt buộc.',
            'numeric'  => 'Trường :attribute không hợp lệ.',
            'max'      => [
                'string' => 'Trường :attribute không được vượt quá :max ký tự.',
             ],
            'boolean'  => 'Trường :attribute không hợp lệ.',
         ];
    }
}
