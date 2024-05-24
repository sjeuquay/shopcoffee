<?php

namespace App\Models\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;

    const product_id  = 'product_id';
    const length = 'length';
    const width = 'width';
    const height = 'height';
    const weight_id = 'weight_id';
    const actual_weight = 'actual_weight';
    const size_id = 'size_id';
    const actual_size = 'actual_size';
    const specification_price = 'specification_price';

    protected $table    = 'product_specification';
    public $timestamps  = false;
    protected $fillable = [
        self::product_id,
        self::length,
        self::width,
        self::height,
        self::weight_id,
        self::actual_weight,
        self::size_id,
        self::actual_size,
        self::specification_price,
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function sizeType()
    {
        return $this->belongsTo(SizeType::class, 'size_id');
    }
    public function weightType()
    {
        return $this->belongsTo(WeightType::class, 'weight_id');
    }
}
