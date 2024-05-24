<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRelatedRequest;
use App\Models\Product\ProductRelated;
use App\Utils\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProductRelatedController extends Controller
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
        return view("admin.product.relatedList")->with('list', ProductRelated::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Thêm product related';
        $route = route('admin.products.related.store');
        $method = 'POST';
        return view("admin.product.relatedForm",compact("title","route","method"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRelatedRequest $request)
    {
        ProductRelated::create($request->all());
        return redirect()->route('admin.products.related.index')
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
        $title = 'Sửa product related';
        $relatedProduct = ProductRelated::findOrFail($id);
        $route = route('admin.products.related.update',$relatedProduct);
        $method = 'PUT';
        return view("admin.product.relatedForm",compact("title","route","method","relatedProduct"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRelatedRequest $request, string $id)
    {
        $relatedProduct = ProductRelated::findOrFail($id);
        $relatedProduct->related_id_list = $request->input('related_id_list');
        $relatedProduct->recommend_id_list = $request->input('recommend_id_list');
        
        $relatedProduct->save();

        return redirect()->route('admin.products.related.index')
            ->with('response_message', Message::out('success', 'Sản phẩm liên quan đã được sửa thành công !'));
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $relatedProduct = ProductRelated::findOrFail($id);
        $relatedProduct->delete();

        return redirect()->route('admin.products.related.index')
            ->with('response_message', Message::out('success', 'Sản phẩm liên quan đã được xóa thành công !'));
    }
}
