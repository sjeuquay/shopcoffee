<?php

namespace App\Models\Equipment;

use App\Models\Setting\Status;
use App\Models\Vendor\Vendor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipment extends Model
{
    use HasFactory;

    const ID                = 'id';
    const SERIAL_NUMBER     = 'serial_number';
    const VENDOR_ID         = 'vendor_id';
    const BRANCH_ID         = 'branch_id';
    const NAME              = 'name';
    const DESCRIPTION       = 'description';
    const STATUS_CODE       = 'status_code';
    const TOTAL_TIME_USED   = 'total_time_used';
    const COMMISSION_TIME   = 'commission_time';
    const DECOMMISSION_TIME = 'decommision_time';
    const UPDATED_TIME      = 'updated_time';

    public $incrementing  = false;
    public $timestamps    = false;
    protected $table      = 'equipments';
    protected $primaryKey = self::SERIAL_NUMBER;

    //  VENDOR RELATION
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    // EQUIPMENT BRANCH RELATION
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    // STATUS RELATION
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, self::STATUS_CODE, 'status_code');
    }

    // LOGS RELATION
    public function logs(): HasMany
    {
        return $this->hasMany(Logs::class);
    }

    protected $fillable = [
        self::SERIAL_NUMBER,
        self::VENDOR_ID,
        self::BRANCH_ID,
        self::NAME,
        self::DESCRIPTION,
        self::STATUS_CODE,
        self::TOTAL_TIME_USED,
        self::COMMISSION_TIME,
        self::DECOMMISSION_TIME,
        self::UPDATED_TIME,
     ];

    protected $casts = [
        self::SERIAL_NUMBER     => 'string',
        self::NAME              => 'string',
        self::DESCRIPTION       => 'string',
        self::TOTAL_TIME_USED   => 'float',
        self::COMMISSION_TIME   => 'datetime',
        self::DECOMMISSION_TIME => 'datetime',
        self::UPDATED_TIME      => 'datetime',
     ];

}
