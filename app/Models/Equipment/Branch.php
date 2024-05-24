<?php

namespace App\Models\Equipment;

use App\Models\Setting\Status;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;

    const ID               = 'id';
    const BRANCH_NAME      = 'branch_name';
    const DESCRIPTION      = 'description';
    const RENT_PRICE       = 'rent_price';
    const STATUS           = 'status';
    const DATE_MANUFACTURE = 'date_manufacture';
    const UPDATED_TIME     = 'updated_time';

    public $timestamps  = false;
    protected $table    = 'equipment_branch';
    protected $fillable = [
        self::BRANCH_NAME,
        self::DESCRIPTION,
        self::RENT_PRICE,
        self::STATUS,
        self::DATE_MANUFACTURE,
        self::UPDATED_TIME,
     ];
    protected $casts = [
        self::RENT_PRICE       => 'float',
        self::DATE_MANUFACTURE => 'date',
        self::UPDATED_TIME     => 'datetime',
     ];

    protected function status(): Attribute
    {
        $boolean_map = [
            'Active'   => 1,
            'Inactive' => 0,
         ];
        return Attribute::make(
            get: fn(string $value) => $value ? "Active" : 'Inactive',
            set: fn(string $value) => $boolean_map[ $value ],
        );
    }

    public function equipments(): HasMany
    {
        return $this->hasMany(Equipment::class);
    }
}
