<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\StoreParameter;
use App\Utils\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View;

class StoreParameterController extends Controller
{
    protected $validate_details = [
        'parameter_name' => 'required|max:50',
        'value'          => 'required|max:20',
    ];
    protected $validate_errors = [
        'parameter_name.required' => 'Vui lòng nhập tên tham số',
        'parameter_name.max'      => 'Tham số không được dài hơn 50 ký tự',
        'value.required'          => 'Vui lòng nhập giá trị',
        'value.max'               => 'Giá trị không được dài hơn 20 ký tự',
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
        return view('admin.setting.StoreParameterIndex', ['list' => StoreParameter::all()]);
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
        StoreParameter::create($validated);
        return redirect()->route('admin.setting.storeparameter.index')
            ->with('response_message', Message::out('success', 'Thêm thành công.'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StoreParameter $store_parameter)
    {
        $validated = $request
            ->validate($this->validate_details, $this->validate_errors);

        $store_parameter->update($validated);
        return redirect()->route('admin.setting.storeparameter.index')
            ->with('response_message', Message::out('info', 'Cập nhật thành công.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StoreParameter $store_parameter): RedirectResponse
    {
        $store_parameter->delete();
        return redirect()->route('admin.setting.storeparameter.index')
            ->with('response_message', Message::out('danger', 'Xóa thành công.'));
    }
}
