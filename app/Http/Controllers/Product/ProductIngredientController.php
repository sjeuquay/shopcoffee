<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\IngredientRequest;
use App\Models\Product\Ingredient;
use App\Models\Product\Product;
use App\Utils\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProductIngredientController extends Controller
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
        $ingredients = Ingredient::all();
        return view("admin.product.ingredientList")->with('ingredients', $ingredients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Thêm nguyên liệu';
        $route = route('admin.products.ingredients.store');
        $method = 'POST';
        $product_id = Product::all();
        return view("admin.product.ingredientForm",compact("title","route","method","product_id"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IngredientRequest $request)
    {
        // dd($request);
        $data = $request->all();
        Ingredient::create($data);;
        return redirect()->route('admin.products.ingredients.index')
            ->with('response_message', Message::out('success', 'Nguyên liệu đã được thêm thành công!'));
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
        $title = 'Sửa nguyên liệu';
        $ingredient = Ingredient::findOrFail($id);
        $route = route('admin.products.ingredients.update',$ingredient);
        $method = 'PUT';
        $product_id = Product::all();
        return view("admin.product.ingredientForm",compact("title","route","method","ingredient","product_id"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IngredientRequest $request, string $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->update($request->all());
        return redirect()->route('admin.products.ingredients.index')
        ->with('response_message', Message::out('success', 'Nguyên liệu đã được sửa thành công !'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
        return redirect()->route('admin.products.ingredients.index')->with('response_message', Message::out('success','Nguyên liệu đã được xóa thành công !'));
    }
}
