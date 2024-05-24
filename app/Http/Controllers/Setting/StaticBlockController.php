<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\StaticBlock;
use App\Utils\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View;

class StaticBlockController extends Controller
{
    protected $validate_details = [
        'identifier' => 'nullable|max:20',
        'name'       => 'required|max:50',
        'content'    => 'required',
        'active'     => 'required|in:disable,enable',
        'section'    => 'required|max:255',
        'position'   => 'nullable|boolean',
    ];
    protected $validate_errors = [
        'identifier.max'   => 'Định danh không được dài hơn 20 ký tự',
        'name.required'    => 'Vui lòng nhập tên',
        'name.max'         => 'Tên không được dài hơn 50 ký tự',
        'content.required' => 'Vui lòng nội dung',
        'active.required'  => 'Vui lòng chọn trạng thái cho active',
        'active.in'        => 'Giá trị của active không hợp lệ',
        'position.boolean' => 'Giá trị của position không hợp lệ',

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
            'admin.setting.StaticBlockIndex',
            ['list' => StaticBlock::all()]
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
        StaticBlock::create($validated);
        return redirect()->route('admin.setting.staticblock.index')
            ->with('response_message', Message::out('success', 'Thêm thành công.'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaticBlock $static_block)
    {
        $validated = $request
            ->validate($this->validate_details, $this->validate_errors);

        $static_block->update($validated);
        return redirect()->route('admin.setting.staticblock.index')
            ->with('response_message', Message::out('info', 'Cập nhật thành công.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaticBlock $static_block): RedirectResponse
    {
        $static_block->delete();
        return redirect()->route('admin.setting.staticblock.index')
            ->with('response_message', Message::out('danger', 'Xóa thành công.'));
    }
}
