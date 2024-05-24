<?php

namespace App\Http\Controllers\Equipment;

use App\Http\Controllers\Controller;
use App\Models\Equipment\Branch;
use App\Models\Setting\Status;
use App\Utils\Message;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;

class BranchController extends Controller
{
    protected $validate_details = [
        Branch::BRANCH_NAME      => 'required|max:20',
        Branch::DESCRIPTION      => 'required|max:200',
        Branch::RENT_PRICE       => 'required|numeric',
        Branch::STATUS           => 'required|in:Active,Inactive',
        Branch::DATE_MANUFACTURE => 'nullable|date',
        Branch::UPDATED_TIME     => 'nullable|date',
    ];
    protected $validate_errors = [
        Branch::BRANCH_NAME . '.required'  => 'Vui lòng nhập tên hãng',
        Branch::BRANCH_NAME . '.max'       => 'Tên hãng không được quá 20 kí tự',
        Branch::DESCRIPTION . '.required'  => 'Vui lòng nhập mô tả',
        Branch::DESCRIPTION . '.max'       => 'Mô tả không được quá 200 kí tự',
        Branch::RENT_PRICE . '.required'   => 'Vui lòng nhập giá thuê',
        Branch::RENT_PRICE . '.numeric'    => 'Giá thuê phải là số',
        Branch::STATUS . '.required'       => 'Vui lòng chọn trạng thái',
        Branch::STATUS . '.in'             => 'Trạng thái không hợp lệ',
        Branch::DATE_MANUFACTURE . '.date' => 'Ngày sản xuất không hợp lệ',
        Branch::UPDATED_TIME . '.date'     => '',
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
            'admin.equipment.BranchIndex',
            ['list' => Branch::all()]
        );
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
        $validated[Branch::UPDATED_TIME] = now();
        Branch::create($validated);
        return redirect()->route('admin.equipment.branch.index')
            ->with('response_message', Message::out('success', 'Thêm thành công.'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        $validated = $request
            ->validate($this->validate_details, $this->validate_errors);
        $validated[Branch::UPDATED_TIME] = now();
        $branch->update($validated);
        return redirect()->route('admin.equipment.branch.index')
            ->with('response_message', Message::out('info', 'Cập nhật thành công.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch): RedirectResponse
    {

        $branch->delete();
        return redirect()->route('admin.equipment.branch.index')
            ->with('response_message', Message::out('danger', 'Xóa thành công.'));
    }
}
