<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeType extends Model
{
    use HasFactory;
    protected $table    = 'size_type';
    public $timestamps  = false;
    protected $fillable = [
        'is_default',
        'description',
     ];

    public function productSpecifications()
    {
        return $this->hasMany(ProductSpecification::class, 'size_id');
    }

    protected $attributes = [
        'is_default'  => 'mặc định',
        'description' => 'mô tả',
     ];
}
