<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sequence extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table   = 'controler_sequence',
    $primaryKey        = 'id',
    $casts             = [ 'id' => 'string' ],
    $fillable          = [
        'id',
        'description',
     ];
}
