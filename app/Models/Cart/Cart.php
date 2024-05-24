<?php

namespace App\Models\Cart;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    public $timestamps = false;
    protected $fillable = [
        'active',
        'user_id',
        'session_id',
        'session_token',
        'promo_id',
        'estimated_tax',
        'total_price',
        'session_created_at',
        'session_modified_at'
    ];
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}


