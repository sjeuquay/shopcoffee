<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Utils\Message;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryList = Category::orderBy('id', 'desc')->get();
        return view('admin.category.list')->with('list', $categoryList);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Thêm Category';
        return view('admin.category.addForm', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $file_name = null;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $ext = $file->extension();
            $file_name = time() . '-' . 'category.' . $ext;
            $file->move(public_path('img/category'), $file_name);
        }
        $data = $request->all();
        $data['image'] = $file_name;
        Category::create($data);

        return redirect()->route('admin.category.list.index')
            ->with('response_message', Message::out('success', 'Danh mục đã được thêm thành công!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Sửa Category';
        $category = Category::findOrFail($id);
        return view('admin.category.editForm', compact('title', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::findOrFail($id);

        // Kiểm tra xem người dùng đã tải lên ảnh mới hay chưa
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ (nếu có)
            $oldImagePath = public_path('img/category/' . $category->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            // Lưu ảnh mới
            $image = $request->file('image');
            $imageName = time() . '-' . 'category.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/category'), $imageName);
        }

        // Cập nhật thông tin danh mục từ các trường dữ liệu khác
        $category->fill($request->only(['name', 'description', 'url_key', 'meta_description']));
        $category->image = $imageName;

        // Lưu các thay đổi vào cơ sở dữ liệu
        $category->save();
        // dd($category);

        return redirect()->route('admin.category.list.index')->with('response_message', Message::out('success', 'Danh mục đã được sửa thành công !'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        if($category->image) {
            // Xóa ảnh cũ (nếu có)
            $oldImagePath = public_path('img/category/' . $category->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $category->delete();

        return redirect()->route('admin.category.list.index')
            ->with('response_message', Message::out('success', 'Danh mục đã được xóa thành công !'));
    }
}
