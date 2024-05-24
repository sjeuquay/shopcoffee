<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\ErrorCode;
use App\Utils\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View;

class ErrorCodeController extends Controller
{
    protected $validate_details = [
        'id'          => 'required|max:10|unique:controller_error_code',
        'description' => 'required|max:100',
    ];
    protected $validate_errors = [
        'id.required'          => 'Vui lòng nhập mã lỗi',
        'id.max'               => 'Mã lỗi không được quá 10 kí tự',
        'id.unique'            => 'Mã lỗi đã tồn tại',
        'description.required' => 'Vui nhập mô tả',
        'description.max'      => 'Mô tả không được quá 100 kí tự',
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
        return view('admin.setting.ErrorCodeIndex', ['list' => ErrorCode::all()]);
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
        ErrorCode::create($validated);
        return redirect()->route('admin.setting.ErrorCode.index')
            ->with('response_message', Message::out('success', 'Thêm thành công.'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ErrorCode = ErrorCode::find($id);
        $validated = $request
            ->validate([
                ...$this->validate_details,
                'id' => $this->validate_details['id'] . ",id," . $ErrorCode->id,
            ], $this->validate_errors);

        $ErrorCode->update($validated);
        return redirect()->route('admin.setting.ErrorCode.index')
            ->with('response_message', Message::out('info', 'Cập nhật thành công.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ErrorCode::find($id)->delete();
        return redirect()->route('admin.setting.ErrorCode.index')
            ->with('response_message', Message::out('danger', 'Xóa thành công.'));
    }
}
