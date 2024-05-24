<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRoleRequest;
use App\Models\User\RolePermission;
use App\Models\User\UserRole;
use App\Utils\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserRoleController extends Controller
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
        $roles = UserRole::with('permission')->get();
        return view('admin.user.userRoleList', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Thêm role';
        $route = route('admin.user.role.store');
        $method = 'POST';
        $permission_id = RolePermission::all();
        return view('admin.user.userRoleForm', compact('permission_id', 'title', 'method', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRoleRequest $request)
    {
        $data = $request->all();
        UserRole::create($data);
        return redirect()->route('admin.user.role.index')
            ->with('response_message', Message::out('success', 'User Role đã được thêm thành công!'));
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
        $title = 'Sửa role';
        $route = route('admin.user.role.update', $id);
        $method = 'PUT';
        $userRole = UserRole::findOrFail($id);
        $permission_id = RolePermission::all();
        return view('admin.user.userRoleForm', compact('permission_id', 'title', 'method', 'route', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRoleRequest $request, string $id)
    {
        // Lấy dữ liệu từ yêu cầu
        $data = $request->all();

        // Tìm UserRole cần cập nhật theo $id
        $userRole = UserRole::findOrFail($id);

        // Cập nhật dữ liệu của UserRole
        $userRole->update($data);
        return redirect()->route('admin.user.role.index')
            ->with('response_message', Message::out('success', 'User role đã được sửa thành công !'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userRole = UserRole::findOrFail($id);
        $userRole->delete();

        return redirect()->route('admin.user.role.index')
            ->with('response_message', Message::out('success', 'User Role đã được xóa thành công !'));
    }
}
