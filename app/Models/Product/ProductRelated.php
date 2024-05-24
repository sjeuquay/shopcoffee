<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRelated extends Model
{
    use HasFactory;
    protected $table = "product_related";
    public $timestamps = false;
    protected $fillable = ['id','related_id_list','recommend_id_list'];
}
