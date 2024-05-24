<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\WeightTypeRequest;
use App\Models\Product\WeightType;
use App\Utils\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WeightTypeController extends Controller
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
        return view("admin.product.weightType.list")->with("list",WeightType::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.weightType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeightTypeRequest $request)
    {
        WeightType::create($request->all());
        return redirect()->route('admin.products.weightType.index')
        ->with('response_message', Message::out('success', 'Sản phẩm liên quan đã được thêm thành công!'));
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
        return view('admin.product.weightType.edit')->with('s', WeightType::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeightTypeRequest $request, string $id)
    {
        WeightType::find($id)->update($request->all());
        return redirect()->route('admin.products.weightType.index')
            ->with('response_message', Message::out('success', 'Cập nhật thành công.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $weightType = WeightType::findOrFail($id);
        $weightType->delete();
        return redirect()->route('admin.products.weightType.index')
            ->with('response_message', Message::out('danger', 'Xóa thành công.'));
    }
}
