<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    const ID               = 'id';
    const DESCRIPTION      = 'description';
    const LONG_DESCRIPTION = 'long_description';
    const DATE_CREATED     = 'date_created';
    const DATE_MODIFIED    = 'date_modified';

    protected $table     = 'vendor_type';
    protected $createdAt = self::DATE_CREATED;
    protected $updatedAt = self::DATE_MODIFIED;

    protected $attributes = [
        self::DESCRIPTION      => 'mô tả',
        self::LONG_DESCRIPTION => 'mô tả dài',
     ];
    protected $fillable = [
        self::DESCRIPTION,
        self::LONG_DESCRIPTION,
     ];
    protected $casts = [
        self::DATE_CREATED  => 'datetime',
        self::DATE_MODIFIED => 'datetime',
     ];

}
