<?php

namespace App\Models\Vendor;

use App\Models\Vendor\Vendor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;

    const ID           = 'id';
    const VENDOR_ID    = 'vendor_id';
    const ADDRESS      = 'address';
    const ADDRESS_2    = 'address_2';
    const CITY         = 'city';
    const PROVINCE     = 'province';
    const COUNTRY      = 'country';
    const EMAIL        = 'email';
    const PHONE        = 'phone';
    const LATITUDE     = 'latitude';
    const LONGTITUDE   = 'longtitude';
    const OPENING_TIME = 'opening_time';
    const CLOSING_TIME = 'closing_time';
    const IS_MOBILE    = 'is_mobile';
    const IS_DEFAULT   = 'is_default';
    const IS_BILLING   = 'is_billing';
    const IS_SHIPPING  = 'is_shipping';
    const UPDATE_TIME  = 'update_time';

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    protected $table   = 'vendor_contact';
    public $timestamps = false;

    protected $attributes = [
        self::VENDOR_ID    => 'đại lý',
        self::ADDRESS      => 'địa chỉ',
        self::ADDRESS_2    => 'địa chị phụ',
        self::CITY         => 'thành phố',
        self::PROVINCE     => 'tỉnh',
        self::COUNTRY      => 'quốc gia',
        self::EMAIL        => 'email',
        self::PHONE        => 'số điện thoại',
        self::LATITUDE     => 'vĩ độ',
        self::LONGTITUDE   => 'kinh độ',
        self::OPENING_TIME => 'thời gian mở cửa',
        self::CLOSING_TIME => 'thời gian đóng cửa',
        self::IS_MOBILE    => 'Liên lạc điện thoại',
        self::IS_DEFAULT   => 'hoạt động',
        self::IS_BILLING   => 'thanh toán',
        self::IS_SHIPPING  => 'vận chuyển',
     ];

    protected $fillable = [
        self::VENDOR_ID,
        self::ADDRESS,
        self::ADDRESS_2,
        self::CITY,
        self::PROVINCE,
        self::COUNTRY,
        self::EMAIL,
        self::PHONE,
        self::LATITUDE,
        self::LONGTITUDE,
        self::OPENING_TIME,
        self::CLOSING_TIME,
        self::IS_MOBILE,
        self::IS_DEFAULT,
        self::IS_BILLING,
        self::IS_SHIPPING,
        self::UPDATE_TIME,
     ];

    protected $casts = [
        self::IS_MOBILE   => 'boolean',
        self::IS_DEFAULT  => 'boolean',
        self::IS_BILLING  => 'boolean',
        self::IS_SHIPPING => 'boolean',
        self::UPDATE_TIME => 'datetime',
     ];

}
