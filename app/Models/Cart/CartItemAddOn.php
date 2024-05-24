<?php

namespace App\Models\Cart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Ingredient;
use App\Models\Cart\CartItem;

class CartItemAddOn extends Model
{
    use HasFactory;
    protected $table = 'cart_item_add_on';
    public $timestamps = false;
    protected $fillable = [ 
        'id',
        'cart_item_id',
        'product_id',
        'ingredient_id',
        'quantity',
        'unit_price',
        'sub_total',
        'created_date',
        'modified_date'
    ];

    public function ingredient() {
        return $this->belongsTo(Ingredient::class);
    }
    public function cartitem(){
        return $this->belongsTo(CartItem::class);
    }
}
