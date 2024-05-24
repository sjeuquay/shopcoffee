<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromotionRequest;
use App\Models\Promotion;
use App\Utils\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PromotionController extends Controller
{
    public  function __construct(Request $request) {
        $admin = $request->session()->get('isAdmin');
        View::share('admin',$admin);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::all();
        return view("admin.promotion.list", compact("promotions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm khuyến mãi";
        $route = route("admin.promotion.store");
        $method = 'POST';
        return view("admin.promotion.form", compact("title", "route", "method"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromotionRequest $request)
    {
        $data = $request->all();
        $data['expiration_date'] = Carbon::parse($data['expiration_date'])->format('Y-m-d H:i:s');
        Promotion::create($data);
        return redirect()->route('admin.promotion.index')->with('response_message', Message::out('success', 'Khuyến mãi đã được thêm thành công !'));
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
        $title = "Sửa khuyến mãi";
        $promotion = Promotion::findOrFail($id);
        $route = route("admin.promotion.update", $promotion);
        $method = 'PUT';
        return view("admin.promotion.form", compact("title", "route", "method", "promotion"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PromotionRequest $request, string $id)
    {
        $data = $request->all();
        $data['expiration_date'] = Carbon::parse($data['expiration_date'])->format('Y-m-d H:i:s');
        $promotion = Promotion::findOrFail($id);
        $promotion->update($data);
        return redirect()->route('admin.promotion.index')->with('response_message', Message::out('success', 'Khuyến mãi đã được sửa thành công !'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();

        return redirect()->route('admin.promotion.index')
            ->with('response_message', Message::out('success', 'Khuyến mãi đã được xóa thành công !'));
    }
}
