<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatusRequest;
use App\Models\Setting\Status;
use App\Utils\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View;

class StatusController extends Controller
{
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
        $statuses = Status::all(); // Sắp xếp dữ liệu theo thứ tự mới nhất
        return view("admin.setting.status.list")->with('status', $statuses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $title  = 'Thêm status';
        $route  = route('admin.setting.status.store');
        $method = 'POST';
        return view("admin.setting.status.form", compact("title", "route", "method"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatusRequest $request): RedirectResponse
    {
        Status::create($request->all());
        return redirect()->route('admin.setting.status.index')
            ->with('response_message', Message::out('success', 'Status đã được thêm thành công!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $title  = "Sửa status";
        $status = Status::where('status_code', sprintf("%02d", $id))->first();
        $route  = route('admin.setting.status.update', $status->status_code);
        $method = 'PUT';

        return view("admin.setting.status.form", compact("title", "status", "method", "route"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StatusRequest $request, string $id): RedirectResponse
    {

        Status::where('status_code', sprintf("%02d", $id))->update([
            'status_code' => $request->status_code,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.setting.status.index')
            ->with('response_message', Message::out('success', 'Status đã được sửa thành công !'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Status::where('status_code', sprintf("%02d", $id))->delete();
        return redirect()->route('admin.setting.status.index')
            ->with('response_message', Message::out('success', 'Status đã được xóa thành công !'));
    }
}
