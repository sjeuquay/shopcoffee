<?php

namespace App\Http\Controllers\Equipment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Equipment\EquipmentRequest;
use App\Models\Equipment\Branch;
use App\Models\Equipment\Equipment;
use App\Models\Setting\Status;
use App\Models\Vendor\Vendor;
use App\Utils\Message;
use App\Utils\UnixConverter;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;

class EquipmentController extends Controller
{
    public function __construct(Request $request)
    {
        $admin = $request->session()->get('isAdmin');
        FacadesView::share('admin', $admin);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $equipment_list = Equipment::with([ 'status', 'branch' => function ($query) {
            $query->select(Branch::ID, Branch::BRANCH_NAME, Branch::RENT_PRICE);
        } ])->get();

        foreach ($equipment_list as $e) {
            $e[ Equipment::COMMISSION_TIME . '_hm' ] = UnixConverter::HM($e[ Equipment::COMMISSION_TIME ]);
        }

        $vendor_list = Vendor::select(Vendor::ID, Vendor::DISPLAY_NAME)->get();
        $branch_list = Branch::select(Branch::ID, Branch::BRANCH_NAME)->get();
        $status_list = Status::all();

        return view('admin.equipment.index',
            [ 'list' => $equipment_list, ...compact('vendor_list', 'branch_list', 'status_list') ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipmentRequest $request): RedirectResponse
    {
        $validated                            = $request->all();
        $validated[ Equipment::UPDATED_TIME ] = now();
        Equipment::create($validated);
        return redirect()->route('admin.equipment.index', Message::SUCCESS());
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipment $equipment): View
    {

        $suffix = '_hm';
        foreach ([ Equipment::COMMISSION_TIME, Equipment::DECOMMISSION_TIME ] as $column_name) {
            if ($equipment[ $column_name ]) {

                $equipment[ $column_name . $suffix ] = UnixConverter::HM($equipment[ $column_name ]);
            } else {
                $equipment[ $column_name . $suffix ] = 'Chưa có';
            }

        }

        $equipment->load('vendor.status');
        $equipment->load('status');
        $vendor_list = Vendor::select(Vendor::ID, Vendor::DISPLAY_NAME)->get();
        $branch_list = Branch::select(Branch::ID, Branch::BRANCH_NAME)->get();
        $status_list = Status::all();

        return view('admin.equipment.show',
            [ 'e' => $equipment, ...compact('vendor_list', 'branch_list', 'status_list') ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipmentRequest $request, Equipment $equipment): RedirectResponse
    {
        $validated                            = $request->all();
        $validated[ Equipment::UPDATED_TIME ] = now();
        $equipment->update($validated);

        return redirect()->route('admin.equipment.show', $equipment->serial_number)
            ->with('response_message', Message::out('info', 'Cập nhật thành công.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipment $equipment): RedirectResponse
    {
        $equipment->delete();
        return redirect()->route('admin.equipment.index')
            ->with('response_message', Message::out('danger', 'Xóa thành công.'));
    }
}
