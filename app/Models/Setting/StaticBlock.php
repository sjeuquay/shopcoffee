<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticBlock extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table   = 'static_blocks',
    $fillable          = [
        'identifier',
        'name',
        'content',
        'active',
        'section',
        'position',
     ];

}
