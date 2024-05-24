<?php

namespace App\Http\Requests\Vendor;

use App\Models\Vendor\Vendor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VendorRequest extends FormRequest
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
        $rules = [
            Vendor::USER_ID             => 'nullable|numeric',
            Vendor::TYPE_ID             => 'required|numeric',
            Vendor::STATUS_CODE         => 'required',
            Vendor::CURRENCY_ID         => 'required|numeric',
            Vendor::ACCOUNT_NUMBER      => 'required|unique:vendor,account_number|max:20',
            Vendor::TITLE               => 'required|max:50',
            Vendor::DISPLAY_NAME        => 'required|max:50',
            // Vendor::LOGO                => 'nullable|',
            Vendor::OWNER_FIRST_NAME    => 'required|max:50',
            Vendor::OWNER_LAST_NAME     => 'required|max:20',
            Vendor::MODIFIED_BY_USER_ID => 'nullable|numeric',
         ];

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules[ Vendor::ACCOUNT_NUMBER ] = Rule::unique('vendor')->ignore($this->route('vendor'));
        }
        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => [
                Vendor::USER_ID          => 'Trường Người dùng là bắt buộc.',
                Vendor::TYPE_ID          => 'Trường Loại đại lý là bắt buộc.',
                Vendor::STATUS_CODE      => 'Trường Trạng thái là bắt buộc.',
                Vendor::CURRENCY_ID      => 'Trường Tiền tệ là bắt buộc.',
                Vendor::ACCOUNT_NUMBER   => 'Trường Mã tài khoản là bắt buộc.',
                Vendor::TITLE            => 'Trường Tên đại lý là bắt buộc.',
                Vendor::DISPLAY_NAME     => 'Trường Tên hiển thị là bắt buộc.',
                Vendor::OWNER_FIRST_NAME => 'Trường Tên người sở hữu là bắt buộc.',
                Vendor::OWNER_LAST_NAME  => 'Trường Họ người sở hữu là bắt buộc.',
             ],
            'numeric'  => [
                Vendor::USER_ID             => 'Trường Người dùng phải là số.',
                Vendor::TYPE_ID             => 'Trường Loại đại lý phải là số.',
                Vendor::CURRENCY_ID         => 'Trường Tiền tệ phải là số.',
                Vendor::MODIFIED_BY_USER_ID => 'Trường Thời gian cập nhật phải là số.',
             ],
            'max'      => [
                Vendor::ACCOUNT_NUMBER   => 'Trường Mã tài khoản không được vượt quá :max ký tự.',
                Vendor::TITLE            => 'Trường Tên đại lý không được vượt quá :max ký tự.',
                Vendor::DISPLAY_NAME     => 'Trường Tên hiển thị không được vượt quá :max ký tự.',
                Vendor::OWNER_FIRST_NAME => 'Trường Tên người sở hữu không được vượt quá :max ký tự.',
                Vendor::OWNER_LAST_NAME  => 'Trường Họ người sở hữu không được vượt quá :max ký tự.',
             ],
            'unique'   => 'Giá trị của trường :attribute đã tồn tại.',
         ];
    }
}
