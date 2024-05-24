<?php

namespace App\Http\Requests\Equipment;

use App\Models\Equipment\Equipment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EquipmentRequest extends FormRequest
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
            Equipment::SERIAL_NUMBER     => 'required|max:50|unique:equipments,serial_number',
            Equipment::VENDOR_ID         => 'nullable|numeric',
            Equipment::BRANCH_ID         => 'required|numeric',
            Equipment::NAME              => 'required|max:50',
            Equipment::DESCRIPTION       => 'required|max:200',
            Equipment::STATUS_CODE       => 'required',
            Equipment::TOTAL_TIME_USED   => 'required|numeric',
            Equipment::COMMISSION_TIME   => 'required',
            Equipment::DECOMMISSION_TIME => 'nullable',
            Equipment::UPDATED_TIME      => 'nullable',
         ];

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules[ 'serial_number' ] = Rule::unique('equipments')->ignore($this->route('equipment'));
        }
        return $rules;
    }

    public function messages(): array
    {
        return [
            Equipment::SERIAL_NUMBER . ".required"   => "Vui lòng nhập số sêri",
            Equipment::SERIAL_NUMBER . ".max"        => "Số sêri không được quá 50 ký tự",
            Equipment::SERIAL_NUMBER . ".unique"     => "Số sêri đã tồn tại",
            Equipment::VENDOR_ID . ".numeric"        => "Đại lý không hợp lệ",
            Equipment::BRANCH_ID . ".required"       => "Vui lòng chọn hãng thiết bị",
            Equipment::BRANCH_ID . ".numeric"        => "Hãng thiết bị không hợp lệ",
            Equipment::STATUS_CODE . ".required"     => "Vui lòng chọn trạng thái",
            Equipment::TOTAL_TIME_USED . ".required" => "Vui lòng nhập tổng thời gian sử dụng",
            Equipment::TOTAL_TIME_USED . ".numeric"  => "Tổng thời gian hoạt động phải là số",
            Equipment::COMMISSION_TIME . ".required" => "Vui lòng nhập thời gian làm việc",
            Equipment::NAME . ".required"            => "Vui lòng nhập tên thiết bị",
            Equipment::NAME . ".max"                 => "Tên thiết bị không được quá 50 ký tự",
            Equipment::DESCRIPTION . ".required"     => "Vui lòng nhập mô tả",
            Equipment::DESCRIPTION . ".max"          => "Mô tả không được quá 200 ký tự",

         ];
    }
}
