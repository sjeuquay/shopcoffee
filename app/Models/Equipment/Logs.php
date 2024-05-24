<?php

namespace App\Models\Equipment;

use App\Models\Setting\Sequence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Logs extends Model
{
    use HasFactory;

    const ID                    = 'id';
    const EQUIPMENT_ID          = 'equipment_id';
    const SEQUENCE_ID           = 'sequence_id';
    const FIRMWARE_CTL_ERROR_ID = 'firmware_ctl_error_id';
    const CREATED_DATE          = 'created_date';

    public $timestamps = false;
    protected $table   = 'equipment_logs';

    protected $fillable = [
        self::EQUIPMENT_ID,
        self::SEQUENCE_ID,
        self::FIRMWARE_CTL_ERROR_ID,
     ];

    protected $casts = [
        self::CREATED_DATE => 'timestamp',
     ];

    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class, 'id');
    }

    public function sequence(): BelongsTo
    {
        return $this->belongsTo(Sequence::class);
    }
}
