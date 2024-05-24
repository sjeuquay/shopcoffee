<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryCode extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table   = 'country_code',
    $primaryKey        = 'code',
    $fillable          = [ 'code', 'language', 'short_name', 'full_name' ];
}
