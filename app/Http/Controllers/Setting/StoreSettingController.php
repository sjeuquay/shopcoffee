<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\StoreSetting;
use App\Utils\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View;

class StoreSettingController extends Controller
{
    protected $validate_details = [
        'process_identifier' => 'required|max:30',
        'stastus_id'         => 'required|numeric',
    ];
    protected $validate_errors = [
        'process_identifier.required' => 'Vui lòng nhập định danh quá trinh',
        'process_identifier.max'      => 'Định danh quá trình không được dài hơn 30 ký tự',
        'stastus_id.required'         => 'Vui lòng chọn trạng thái',
        'stastus_id.numeric'          => 'Trạng thái không hợp lệ',
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
        return view(
            'admin.setting.StoreSettingIndex',
            ['list' => StoreSetting::all()]
        );
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
        StoreSetting::create($validated);
        return redirect()->route('admin.setting.storesetting.index')
            ->with('response_message', Message::out('success', 'Thêm thành công.'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StoreSetting $store_setting)
    {
        $validated = $request
            ->validate($this->validate_details, $this->validate_errors);

        $store_setting->update($validated);
        return redirect()->route('admin.setting.storesetting.index')
            ->with('response_message', Message::out('info', 'Cập nhật thành công.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StoreSetting $store_setting): RedirectResponse
    {
        $store_setting->delete();
        return redirect()->route('admin.setting.storesetting.index')
            ->with('response_message', Message::out('danger', 'Xóa thành công.'));
    }
}
