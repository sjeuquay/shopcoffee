<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table   = 'payment_methods',
    $fillable          = [
        'type',
        'short_description',
        'special_notes',
     ];
}
