<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightType extends Model
{
    use HasFactory;
    protected $table = 'weight_type';
    public $timestamps = false;
    protected $fillable = ['description'];
}
