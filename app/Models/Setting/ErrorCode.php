<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class ErrorCode extends Model
{
    public $timestamps = false;
    protected $table   = 'controller_error_code',
    $primaryKey        = 'id',
    $casts             = [ 'id' => 'string' ],
    $fillable          = [
        'id',
        'description',
     ];
}
