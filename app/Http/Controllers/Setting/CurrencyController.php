<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\Currency;
use App\Utils\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View;

class CurrencyController extends Controller
{
    protected $validate_details = [
        'short_name'        => 'required|max:5',
        'long_name'         => 'required|max:50',
        'USD_exchange_rate' => 'required|numeric',
    ];
    protected $validate_errors = [
        'short_name.required'        => 'Vui lòng nhập tên ngắn',
        'short_name.max'             => 'Tên ngắn không được dài hơn 5 ký tự',
        'long_name.required'         => 'Vui lòng nhập tên dài',
        'long_name.max'              => 'Tên dài không được dài hơn 50 ký tự',
        'USD_exchange_rate.required' => 'Vui lòng nhập tỉ lệ chuyển đổi',
        'USD_exchange_rate.numeric'  => 'Tỉ lệ chuyển đổi phải là số',
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
        return view('admin.setting.CurrencyIndex', ['list' => Currency::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            $this->validate_details,
            $this->validate_errors
        );
        Currency::create($validated);
        return redirect()->route('admin.setting.currency.index')
            ->with('response_message', Message::out('success', 'Thêm thành công.'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $currency)
    {
        $validated = $request
            ->validate($this->validate_details, $this->validate_errors);

        $currency->update($validated);
        return redirect()->route('admin.setting.currency.index')
            ->with('response_message', Message::out('info', 'Cập nhật thành công.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency): RedirectResponse
    {
        $currency->delete();
        return redirect()->route('admin.setting.currency.index')
            ->with('response_message', Message::out('danger', 'Xóa thành công.'));
    }
}
