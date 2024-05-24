<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\PaymentMethod;
use App\Utils\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View;

class PaymentMethodController extends Controller
{
    protected $validate_details = [
        'type'              => 'required|max:50',
        'short_description' => 'required|max:50',
        'special_notes'     => 'required',
    ];
    protected $validate_errors = [
        'type.required'              => 'Vui nhập tên phương thức thanh toán',
        'type.max'                   => 'Phương thức thanh toán không được quá 50 kí tự',
        'short_description.required' => 'Vui nhập mô tả ngắn',
        'short_description.max'      => 'Mô tả ngắn không được quá 50 kí tự',
        'special_notes.required'     => 'Vui lòng nhập ghi chú',
    ];
    public  function __construct(Request $request)
    {
        $admin = $request->session()->get('isAdmin');
        FacadesView::share('admin', $admin);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.setting.PaymentMethodIndex', ['list' => PaymentMethod::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            $this->validate_details,
            $this->validate_errors
        );
        PaymentMethod::create($validated);
        return redirect()->route('admin.setting.paymentmethod.index')
            ->with('response_message', Message::out('success', 'Thêm thành công.'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentMethod $payment_method): RedirectResponse
    {
        $validated = $request
            ->validate($this->validate_details, $this->validate_errors);

        $payment_method->update($validated);
        return redirect()->route('admin.setting.paymentmethod.index')
            ->with('response_message', Message::out('info', 'Cập nhật thành công.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentMethod $payment_method): RedirectResponse
    {
        $payment_method->delete();
        return redirect()->route('admin.setting.paymentmethod.index')
            ->with('response_message', Message::out('danger', 'Xóa thành công.'));
    }
}
