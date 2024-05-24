<?php

namespace App\Models\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $table = "ingredient";
    public $timestamps = false;
    protected $fillable = [
        'option_1','option_2','option_3','unit_price1','unit_price2','unit_price3','created_date','modified_date','product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
