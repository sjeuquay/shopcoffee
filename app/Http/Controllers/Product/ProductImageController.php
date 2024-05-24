<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductImageRequest;
use App\Models\Product\Product;
use App\Models\Product\ProductImage;
use App\Utils\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProductImageController extends Controller
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
        $productImages = ProductImage::with('product')->get();
        return view("admin.product.images.list", compact("productImages"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm ảnh sản phẩm";
        $product_id = Product::select("id", "name")->get();
        $method = 'POST';
        $route = route('admin.products.image.store');
        return view("admin.product.images.form", compact("title", "product_id", "method", "route"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductImageRequest $request)
    {
        if ($request->hasFile('product_large_thumb')) {
            $file = $request->product_large_thumb;
            $ext = $file->extension();
            $file_name_lagre = time() . '-' . 'product-large.' . $ext;
            $file->move(public_path('img/product'), $file_name_lagre);
        }
        if ($request->hasFile('product_small_thumb')) {
            $file = $request->product_small_thumb;
            $ext = $file->extension();
            $file_name_small = time() . '-' . 'product-small.' . $ext;
            $file->move(public_path('img/product'), $file_name_small);
        }
        $data = $request->all();
        $data['product_large_thumb'] = $file_name_lagre;
        $data['product_small_thumb'] = $file_name_small;
        $data['is_front_face'] = intval($request->has('is_front_face'));
        ProductImage::create($data);
        return redirect()->route('admin.products.image.index')
            ->with('response_message', Message::out('success', 'Ảnh sản phẩm đã được thêm thành công!'));
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
        $productImg = ProductImage::findOrFail($id);
        $title = "Sửa ảnh sản phẩm";
        $product_id = Product::select("id", "name")->get();
        $method = 'PUT';
        $route = route('admin.products.image.update', $productImg);
        return view("admin.product.images.form", compact("title", "product_id", "method", "route", "productImg"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductImageRequest $request, string $id)
    {
        $productImg = ProductImage::findOrFail($id);

        if ($request->hasFile('product_large_thumb') && $request->hasFile('product_small_thumb')) {
            // Xóa ảnh cũ (nếu có)
            $oldImagePaths = [
                public_path('img/product/' . $productImg->product_small_thumb),
                public_path('img/product/' . $productImg->product_large_thumb)
            ];
            array_map('unlink', array_filter($oldImagePaths, 'file_exists'));
            $newImagePaths = [
                'large' => $request->product_large_thumb,
                'small' => $request->product_small_thumb,
            ];
            foreach ($newImagePaths as $key => $img) {
                $ext = $img->extension();
                $file_name = time() . '-' . 'product-' . $key . '.' . $ext;
                $file[$key] =$img->move(public_path('img/product'), $file_name);
            }
        }
        $productImg->product_large_thumb = $file['large']->getFilename();
        $productImg->product_small_thumb =  $file['small']->getFilename();
        $productImg->product_position =  $request->input('product_position');
        $productImg->is_front_face = intval($request->has('is_front_face'));
        $productImg->save();
        return redirect()->route('admin.products.image.index')
            ->with('response_message', Message::out('success', 'Ảnh sản phẩm đã được sửa thành công!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productImage = ProductImage::findOrFail($id);
        if($productImage->product_small_thumb && $productImage->product_large_thumb) {
            // Xóa ảnh cũ
            $oldImagePaths = [
                public_path('img/product/' . $productImage->product_small_thumb),
                public_path('img/product/' . $productImage->product_large_thumb)
            ];
            array_map('unlink', array_filter($oldImagePaths, 'file_exists'));
        }
        $productImage->delete();
        return redirect()->route('admin.products.image.index')->with('response_message', Message::out('success', 'Ảnh sản phẩm đã được xóa thành công !'));
    }
}
