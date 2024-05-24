<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    const ID                = 'id';
    const SHORT_NAME        = 'short_name';
    const LONG_NAME         = 'long_name';
    const USD_EXCHANGE_RATE = 'USD_exchange_rate';
    const CREATE_DATE       = 'create_date';
    const MODIFIED_DATE     = 'modified_date';

    protected $table    = 'currency';
    public $timestamps  = false;
    protected $fillable = [
        self::SHORT_NAME,
        self::LONG_NAME,
        self::USD_EXCHANGE_RATE,
     ];
    protected $cast = [
        self::USD_EXCHANGE_RATE => 'float',
     ];
}
