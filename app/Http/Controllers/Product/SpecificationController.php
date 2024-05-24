<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductSpecification;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\WeightType;
use App\Models\Product\SizeType;

class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
    }

    public function add(String $id)
    {
        $product = Product::findOrFail($id);
        $size = SizeType::all();
        $weight = WeightType::all();
        return view(
            'admin.product.specification.create',
            compact('size', 'weight', 'product')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $product = Product::findOrFail($id);
        $specification_list = ProductSpecification::where('product_id', $product->id)->orderBy('id', 'desc')->get();
        $product_name = $product->name;
        $title = "Thông số sản phẩm " . $product_name;

        return view(
            "admin.product.specification.list",
            compact("title", "specification_list", "product")
        );
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
