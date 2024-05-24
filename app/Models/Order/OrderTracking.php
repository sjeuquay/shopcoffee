<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTracking extends Model
{
    use HasFactory;
    protected $table = "order_trackings";
    public $timestamps = false;
    protected $fillable = [
      'order_id', 'carrier', 'special_notes', 'created_date', 'modified_dated', 'created_by_user', 'modified_by_user'
    ];
}
