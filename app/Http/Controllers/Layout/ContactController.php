<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use App\Models\layout\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view('client.layout.contact');
    }
    public function postContact(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
            'zip_code' => 'required',
            'phone_number' => 'required',
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^.+@.+\..+$/i', $value)) {
                        $fail('Địa chỉ email không hợp lệ.');
                    }
                }
            ],
            'contents' => 'required',
        ], [
            'first_name.required' => 'Vui lòng nhập tên',
            'last_name.required' => 'Vui lòng nhập họ',
            'company.required' => 'Vui lòng nhập công ty',
            'zip_code.required' => 'Vui lòng nhập mã bưu chính',
            'phone_number.required' => 'Vui lòng nhập số điện thoại',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'contents.required' => 'Vui lòng nhập nội dung',
        ]);
        try {
            // Tạo mới contact
            if ($request->has('is_current_customer')) {
                // Nếu được chọn, gán giá trị 1 cho trường is_current_customer
                $request['is_current_customer'] = 1;
            }
            Contact::create($request->all());

            // Chuyển hướng sau khi tạo thành công
            return redirect()->route('contact')->with('success', 'Thông tin đã được gửi thành công.');
        } catch (\Throwable $th) {
            // Xử lý ngoại lệ nếu có lỗi xảy ra
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
