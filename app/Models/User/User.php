<?php

namespace App\Models\User;

use App\Models\Cart\Cart;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_name',
        'password',
        'status',
        'activevation_code',
        'device_id',
        'role_id',
        'first_name',
        'last_name',
        'email',
        'ip',
        'phone_number',
        'country_code',
        'last_login',
        'login_attemps',
        'date_joined',
        "updated_time"
    ] ;
    public function cart()
    {
        return $this->hasMany(Cart::class , '');
    }
}
