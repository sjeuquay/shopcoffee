<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $table = "user_roles";
    public $timestamps = false;
    protected $fillable = ['permission_id', 'description'];
    public function permission()
    {
        return $this->belongsTo(RolePermission::class);
    }
}
