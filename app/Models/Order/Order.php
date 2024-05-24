<?php

namespace App\Models\Order;

use App\Models\Product\Product;
use App\Models\Order\OrderTracking;
use App\Models\Order\OrderDetails;
use App\Models\Setting\DeliveryMethod;
use App\Models\Setting\PaymentMethod;
use App\Models\Setting\Status;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    public $timestamps = false;
    protected $fillable = [
        'user_name','modified_by_user_id','discount_amount','payable_amount','amount','payment_id','handling_id','ship_first_name',
        'ship_last_name','ship_address','ship_address2','city','state','zip','phone','email',
        'customer_special_notes','internal_notes','status_code','date_created','date_modified'
    ];

    public function product() {
        return $this->belongsToMany(Product::class,'order_details','product_id','order_id');
    }
    public function payment() {
        return $this->belongsTo(PaymentMethod::class, 'payment_id', 'id');
    }
    public function deliveryMethod() {
        return $this->belongsTo(DeliveryMethod::class,'deliveryMethod_id','type');
    }
    public function tracking() {
        return $this->hasMany(OrderTracking::class);
    }
    public function OrderDetails() {
        return $this->hasMany(OrderDetails::class, 'order_id', 'id');
    }
    public function status() {
        return $this->belongsTo(Status::class,'status_code','status_code');
    }
    public function users() {
        return $this->belongsTo(User::class,'user_name','user_name');
    }
}
