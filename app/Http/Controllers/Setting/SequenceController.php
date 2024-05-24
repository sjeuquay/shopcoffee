<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\Sequence;
use App\Utils\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View;

class SequenceController extends Controller
{
    protected $validate_details = [
        'id'          => 'required|max:5|unique:controler_sequence',
        'description' => 'required|max:50',
    ];
    protected $validate_errors = [
        'id.required'          => 'Vui lòng nhập mã trình tự',
        'id.max'               => 'Mã trình tự không được quá 5 kí tự',
        'id.unique'            => 'Mã trình tự đã tồn tại',
        'description.required' => 'Vui nhập mô tả',
        'description.max'      => 'Mô tả không được quá 50 kí tự',
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
        return view('admin.setting.SequenceIndex', ['list' => Sequence::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            $this->validate_details,
            $this->validate_errors
        );
        Sequence::create($validated);
        return redirect()->route('admin.setting.sequence.index')
            ->with('response_message', Message::out('success', 'Thêm thành công.'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $Sequence  = Sequence::find($id);
        $validated = $request
            ->validate([
                ...$this->validate_details,
                'id' => $this->validate_details['id'] . ",id," . $Sequence->id,
            ], $this->validate_errors);

        $Sequence->update($validated);
        return redirect()->route('admin.setting.sequence.index')
            ->with('response_message', Message::out('info', 'Cập nhật thành công.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Sequence::find($id)->delete();
        return redirect()->route('admin.setting.sequence.index')
            ->with('response_message', Message::out('danger', 'Xóa thành công.'));
    }
}
