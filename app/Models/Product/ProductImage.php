<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = "product_images";
    public $timestamps = false;
    protected $fillable = [
        'product_large_thumb','product_small_thumb','product_position' ,'is_front_face','product_id'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
