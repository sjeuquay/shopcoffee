<?php

namespace App\Models\Cart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Product;
use App\Models\Cart\CartItemAddOn;

class CartItem extends Model
{
    use HasFactory;
    protected $table = 'cart_item';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'cart_id',
        'size',
        'price',
        'product_id',
        'optionName',
        'quantity',
        'sub_total',
        'equipment_id',
        'created_at',
        'modified_at'
    ];
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
    public function cartItemAddOn()
    {
        return $this->hasMany(CartItemAddOn::class);
    }
}
