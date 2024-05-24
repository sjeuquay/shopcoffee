<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\ProductSpecification;
use App\Models\Product\Ingredient;
use App\Models\Category;
use App\Models\Cart\CartItem;
use App\Models\Cart\CartItemAddOn;
use App\Models\Order\Order;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = [
        'category_id',
        'is_active',
        'quantity_available',
        'sku',
        'name',
        'url_key',
        'description',
        'short_description',
        'meta_description',
        'unit_price',
        'is_category_visible',
        'is_category_searchable',
        'internal_image_path',
        'is_in_stock',
        'created_date',
        'modified_date',
        'is_new_from_date',
        'is_new_to_date'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function productSpecification()
    {
        return $this->hasOne(ProductSpecification::class, 'product_id');
    }
    public function ingredient()
    {
        return $this->hasMany(Ingredient::class, 'product_id');
    }
    public function cartitem()
    {
        return $this->hasMany(CartItem::class, 'product_id');
    }
    public function cartitemaddon()
    {
        return $this->hasMany(CartItemAddOn::class, 'product_id');
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
