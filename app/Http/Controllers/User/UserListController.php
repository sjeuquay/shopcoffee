<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserListController extends Controller
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
        $users = User::all();
        return view("admin.user.list", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm";
        $users = User::all();
        return view("admin.user.listForm", compact("title"));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title =  'Sửa thông tin';
        return view('admin.user.listForm', compact('title'));
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

    public function updateStatus(string $id)
    {
        $user = User::findOrFail($id);
        $newStatus = $user->status === 1 ? 2 : 1;
        $user->status = $newStatus;
        $user->save();
        return redirect()->route('admin.user.list.index')
            ->with('response_message', Message::out('success', 'Đã cập nhập lại trạng thái tài khoản!'));
    }
}
