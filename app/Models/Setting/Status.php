<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    const STATUS_CODE = 'status_code';
    const DESCRIPTION = 'description';

    protected $table      = 'status';
    protected $primaryKey = 'status_code';
    public $timestamps    = false;
    protected $fillable   = [
        'description', 'status_code',
     ];
}
