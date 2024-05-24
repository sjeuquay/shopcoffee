<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreParameter extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table   = 'store_parameters',
    $fillable          = [ 'parameter_name', 'value' ];
}
