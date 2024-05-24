<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Product;
use App\Models\Setting\Status;

class OrderDetails extends Model
{
    use HasFactory;
    
    protected $table = 'order_details';
    public $timestamps = false;
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'unit_price',
        'sub_total',
    ];
    public function product() {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function order() {
        return $this->belongsTo(Order::class,'order_id','id');
    }
    
}
