<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;

    protected $table = "role_permissions";
    public $timestamps = false;
    protected $fillable = ['limit_access', 'can_create_m_staff', 'can_create_v_owner', 'can_create_v_staff', 'can_approve_m_staff', 'can_approve_v_owner', 'can_approve_v_staff'];
    // protected $attributes = [];
    public function userRole()
    {
        return $this->hasMany(UserRole::class, 'permission_id', 'id');
    }
}
