<?php

namespace App\Http\Controllers\User;

use App\Models\User\RolePermission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\Message;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $permission_rules = [
        "limit_access",
        "can_create_m_staff",
        "can_create_v_owner",
        "can_create_v_staff",
        "can_approve_m_staff",
        "can_approve_v_owner",
        "can_approve_v_staff"
    ];
    static function convert_data(Request $request)
    {
        $role_permission = $request->all();
        foreach ($role_permission as $key => $value) {
            $role_permission[$key] = $value == 'on' ? 1 : $value;
        }
        return $role_permission;
    }
    public  function __construct(Request $request)
    {
        $admin = $request->session()->get('isAdmin');
        View::share('admin', $admin);
    }
    public function index()
    {
        $rolePermission_list = RolePermission::all();
        $column_name = Schema::getColumnListing('role_permissions');
        $id_position_search = array_search('id', $column_name);
        $column_name_withoutId = array_splice($column_name, $id_position_search + 1);
        return view('admin.user.rolePermission', compact('rolePermission_list', 'column_name_withoutId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.rolePermissionAddForm');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $column_name = Schema::getColumnListing('role_permissions');
        if ($request->hasAny($column_name) == []) {
            return redirect()
                ->back()
                ->with('response_message',  Message::out('danger', 'Thất bại.'));
        }
        $data_converted = self::convert_data($request);
        RolePermission::create($data_converted);
        return redirect()
            ->route("admin.user.rolePermission.index")
            ->with('response_message', Message::out('success', 'Thêm thành công.'));
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
        $rolePermission = RolePermission::findOrFail($id);

        return view('admin.user.rolePermissionEditForm', compact('rolePermission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role_permission = RolePermission::findOrFail($id);

        $role_permission->limit_access = $request->input('limit_access') == 'on' ? 1 : 0;
        $role_permission->can_create_m_staff = $request->input('can_create_m_staff') == 'on' ? 1 : 0;
        $role_permission->can_create_v_owner = $request->input('can_create_v_owner') == 'on' ? 1 : 0;
        $role_permission->can_create_v_staff = $request->input('can_create_v_staff') == 'on' ? 1 : 0;
        $role_permission->can_approve_m_staff = $request->input('can_approve_m_staff') == 'on' ? 1 : 0;
        $role_permission->can_approve_v_owner = $request->input('can_approve_v_owner') == 'on' ? 1 : 0;
        $role_permission->can_approve_v_staff = $request->input('can_approve_v_staff') == 'on' ? 1 : 0;

        $role_permission->save();
        $column_name = Schema::getColumnListing('role_permissions');
        if ($request->hasAny($column_name) == []) {
            return redirect()
                ->back()
                ->with('response_message',  Message::out('danger', 'Thất bại.'));
        }
        return redirect()->route('admin.user.rolePermission.index')
            ->with('response_message', Message::out('success', 'Cập nhật thành công.'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $rolePermission = RolePermission::findOrFail($id);
        $rolePermission->delete();

        return redirect()->route('admin.user.rolePermission.index')
            ->with('response_message', Message::out('danger', 'Xóa thành công !'));
    }
}
