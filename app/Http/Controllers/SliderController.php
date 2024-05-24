<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use App\Utils\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SliderController extends Controller
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
        $slider = Slider::orderBy('id', 'desc')->get();
        return view("admin.slider.list",compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Thêm slider';
        $route = route('admin.sliders.store');
        $method = 'POST';
        return view("admin.slider.form", compact("title", "route", "method"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $file_name = null;
        if ($request->hasFile('slide_image')) {
            $file = $request->slide_image;
            $ext = $file->extension();
            $file_name = time() . '-' . 'slider.' . $ext;
            $file->move(public_path('img/slider'), $file_name);
        }
        $data = $request->all();
        $data['slide_image'] = $file_name;
        Slider::create($data);

        return redirect()->route('admin.sliders.index')
            ->with('response_message', Message::out('success', 'Slider đã được thêm thành công!'));
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
        $slider = Slider::findOrFail($id);
        $route = route('admin.sliders.update', $slider);
        $method = 'PUT';
        return view("admin.slider.form", compact("title", "route", "method", "slider"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, string $id)
    {
        $slider = Slider::findOrFail($id);
        $file_name = null;
        if ($slider->slide_image) {
            // Xóa ảnh cũ (nếu có)
            $oldImagePath = public_path('img/slider/' . $slider->slide_image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        if ($request->hasFile('slide_image')) {
            $file = $request->file('slide_image');
            $ext = $file->extension();
            $file_name = time() . '-' . 'slider.' . $ext;
            $file->move(public_path('img/slider'), $file_name);
        }
        $slider->slide_image = $file_name;
        $slider->slide_index = $request->input('slide_index');
        $slider->slide_content = $request->input('slide_content');
        $slider->active = $request->input('active');
        $slider->save();

        return redirect()->route('admin.sliders.index')
            ->with('response_message', Message::out('success', 'Slider đã được sửa thành công !'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        if ($slider->slide_image) {
            // Xóa ảnh cũ (nếu có)
            $oldImagePath = public_path('img/slider/' . $slider->slide_image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $slider->delete();

        return redirect()->route('admin.sliders.index')
            ->with('response_message', Message::out('success', 'Slider đã được xóa thành công !'));
    }
}
