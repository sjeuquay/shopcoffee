<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OrderDetailController extends Controller
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
        $orderDetail = OrderDetails::with('order.payment','product','order.deliveryMethod')->orderBy('id','desc')->get();
        return view("admin.order.detailList",compact("orderDetail"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.order.detailForm");
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
