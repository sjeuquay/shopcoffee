<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\CountryCode;
use App\Utils\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View;

class CountryCodeController extends Controller
{
    protected $validate_details = [
        'code'       => 'required|numeric',
        'language'   => 'required|max:20',
        'short_name' => 'required|max:3',
        'full_name'  => 'required|max:50',
    ];
    protected $validate_errors = [
        'code.required'       => 'Vui lòng nhập mã số quốc gia',
        'code.numeric'        => 'Mã số quốc gia phải là số',
        'language.required'   => 'Vui lòng nhập ngôn ngữ',
        'language.max'        => 'Ngôn ngữ không được dài hơn 20 ký tự',
        'short_name.required' => 'Vui lòng nhập tên ngắn',
        'short_name.max'      => 'Tên ngắn không được dài hơn 3 ký tự',
        'full_name.required'  => 'Vui lòng nhập tên đầy đủ',
        'full_name.max'       => 'Tên đầy đủ không được dài hơn 50 ký tự',
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
        return view('admin.setting.CountryCodeIndex', ['list' => CountryCode::all()]);
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
        CountryCode::create($validated);
        return redirect()->route('admin.setting.countrycode.index')
            ->with('response_message', Message::out('success', 'Thêm thành công.'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CountryCode $country_code)
    {
        $validated = $request
            ->validate($this->validate_details, $this->validate_errors);

        $country_code->update($validated);
        return redirect()->route('admin.setting.countrycode.index')
            ->with('response_message', Message::out('info', 'Cập nhật thành công.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CountryCode $country_code): RedirectResponse
    {
        $country_code->delete();
        return redirect()->route('admin.setting.countrycode.index')
            ->with('response_message', Message::out('danger', 'Xóa thành công.'));
    }
}
