<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMethod extends Model
{
    use HasFactory;
    protected $table = "delivery_method";
    public $timestamps = false;
    protected $fillable = [
        'type','short_description','long_description'
    ] ;
}
