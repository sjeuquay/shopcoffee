<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\DeliveryMethodRequest;
use App\Models\Setting\DeliveryMethod;
use App\Utils\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DeliveryMethodController extends Controller
{
    public  function __construct(Request $request)
    {
        $admin = $request->session()->get('isAdmin');
        View::share('admin', $admin);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.setting.deliveryMethod.deliveryMethodList")->with('deliveryMethod', DeliveryMethod::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm phương thức vận chuyển";
        $action = route('admin.setting.deliverymethod.store');
        $method = 'POST';
        return view("admin.setting.deliveryMethod.deliveryMethodForm", compact("action", "method", "title"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeliveryMethodRequest $request)
    {
        $data = $request->all();
        DeliveryMethod::create($data);
        return redirect()->route('admin.setting.deliverymethod.index')
            ->with('response_message', Message::out('success', 'Phương vận chuyển đã được thêm thành công!'));
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
    public function edit(string $id)
    {
        $title = "Sửa slider";
        $deliveryMethod = DeliveryMethod::findOrFail($id);
        $action = route('admin.setting.deliverymethod.update', $deliveryMethod);
        $method = 'PUT';
        return view("admin.setting.deliveryMethod.deliveryMethodForm", compact("title", "action", "method", "deliveryMethod"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeliveryMethodRequest $request, string $id)
    {
        $deliveryMethod = DeliveryMethod::findOrFail($id);
        $deliveryMethod->update($request->all());
        return redirect()->route('admin.setting.deliverymethod.index')->with('response_message', Message::out('success', 'Phương vận chuyển đã được sửa thành công !'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deliveryMethod = DeliveryMethod::findOrFail($id);
        $deliveryMethod->delete();
        return redirect()->route('admin.setting.deliverymethod.index')->with('response_message', Message::out('success', 'Phương vận chuyển đã được xóa thành công !'));
    }
}
