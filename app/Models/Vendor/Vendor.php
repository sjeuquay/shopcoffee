<?php

namespace App\Models\Vendor;

use App\Models\Equipment\Equipment;
use App\Models\Setting\Currency;
use App\Models\Setting\Status;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vendor extends Model
{
    use HasFactory;

    const ID                  = 'id';
    const USER_ID             = 'user_id';
    const TYPE_ID             = 'type_id';
    const STATUS_CODE         = 'status_code';
    const CURRENCY_ID         = 'currency_id';
    const ACCOUNT_NUMBER      = 'account_number';
    const TITLE               = 'title';
    const DISPLAY_NAME        = 'display_name';
    const LOGO                = 'logo';
    const OWNER_FIRST_NAME    = 'owner_first_name';
    const OWNER_LAST_NAME     = 'owner_last_name';
    const DATE_JOINED         = 'date_joined';
    const DATE_EXIT           = 'date_exit';
    const UPDATED_TIME        = 'updated_time';
    const MODIFIED_BY_USER_ID = 'modified_by_user_id';

    const DIR_LOGO    = 'img/vendor_logo';
    const DEFAULT_IMG = self::DIR_LOGO . '/default.png';

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function dateJoined(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::createFromFormat('Y-m-d H:i:s', $value)
        );
    }

    protected function dateExit(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value) : null
        );
    }

    public function user_modified(): BelongsTo
    {
        return $this->belongsTo(User::class, 'modified_by_user_id');
    }

    public function equipments(): HasMany
    {
        return $this->hasMany(Equipment::class, 'vendor_id');
    }

    public function contact(): HasMany
    {
        return $this->hasMany(Contact::class, 'vendor_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, self::STATUS_CODE, 'status_code');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    protected $table   = 'vendor';
    public $timestamps = false;

    // protected $attributes = [
    //     self::USER_ID          => 'Người dùng',
    //     self::TYPE_ID          => 'Loại đại lý',
    //     self::STATUS_CODE      => 'Trạng thái',
    //     self::CURRENCY_ID      => 'Tiền tệ',
    //     self::ACCOUNT_NUMBER   => 'Mã tài khoản',
    //     self::TITLE            => 'Tên đại lý',
    //     self::DISPLAY_NAME     => 'Tên hiển thị',
    //     self::LOGO             => 'Logo',
    //     self::OWNER_FIRST_NAME => 'Tên người sở hữu',
    //     self::OWNER_LAST_NAME  => 'Họ người sở hữu',
    //     self::DATE_JOINED      => 'Ngày tham gia',
    //     self::DATE_EXIT        => 'Ngày thoát',
    //     self::UPDATED_TIME     => 'Thời gian cập nhật',
    //  ];

    protected $fillable = [
        self::USER_ID,
        self::TYPE_ID,
        self::STATUS_CODE,
        self::CURRENCY_ID,
        self::ACCOUNT_NUMBER,
        self::TITLE,
        self::DISPLAY_NAME,
        self::LOGO,
        self::OWNER_FIRST_NAME,
        self::OWNER_LAST_NAME,
        self::DATE_JOINED,
        self::DATE_EXIT,
        self::UPDATED_TIME,
        self::MODIFIED_BY_USER_ID,
     ];
    protected $cast = [
        self::DATE_JOINED  => 'datetime',
        self::DATE_EXIT    => 'datetime',
        self::UPDATED_TIME => 'datetime',
     ];

}
