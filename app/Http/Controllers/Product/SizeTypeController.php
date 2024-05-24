<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\SizeType;
use App\Utils\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View;

class SizeTypeController extends Controller
{
    protected $validate_details = [
        'description' => 'required|max:20',
    ];
    protected $validate_errors = [
        'description.required' => 'Vui lòng nhập mô tả kích cỡ',
        'description.max'      => 'Mô tả kích cỡ không được quá 20 ký tự',
    ];
    public  function __construct(Request $request)
    {
        $admin = $request->session()->get('isAdmin');
        FacadesView::share('admin', $admin);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.product.sizetype.list', ['list' => SizeType::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.product.sizetype.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->validate_details, $this->validate_errors);

        SizeType::create($validated);
        return redirect()->route('admin.products.sizetype.index')
            ->with('response_message', Message::out('success', 'Thêm thành công.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(SizeType $sizeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        return view('admin.product.sizetype.edit')->with('s', SizeType::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {

        $validated = $request
            ->validate($this->validate_details, $this->validate_errors);

        SizeType::find($id)->update($validated);
        return redirect()->route('admin.products.sizetype.index')
            ->with('response_message', Message::out('info', 'Cập nhật thành công.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        SizeType::find($id)->delete();
        return redirect()->route('admin.products.sizetype.index')
            ->with('response_message', Message::out('danger', 'Xóa thành công.'));
    }
}
