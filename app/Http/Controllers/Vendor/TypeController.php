<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Vendor\Type;
use App\Utils\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View;

class TypeController extends Controller
{
    protected $validate_details = [
        Type::DESCRIPTION      => 'required|max:50',
        Type::LONG_DESCRIPTION => 'max:200',
    ];
    protected $validate_errors = [
        'required' => 'Trường :attribute là bắt buộc',
        'max'      => 'Trường :attribute không được quá :max kí tự',
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
        return view('admin.setting.VendorTypeIndex', ['list' => Type::all()]);
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
        Type::create($validated);
        return redirect()->route('admin.setting.vendortype.index')
            ->with('response_message', Message::out('success', 'Thêm thành công.'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $validated = $request
            ->validate($this->validate_details, $this->validate_errors);

        $type->update($validated);
        return redirect()->route('admin.setting.vendortype.index')
            ->with('response_message', Message::out('info', 'Cập nhật thành công.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.setting.vendortype.index')
            ->with('response_message', Message::out('danger', 'Xóa thành công.'));
    }
}
