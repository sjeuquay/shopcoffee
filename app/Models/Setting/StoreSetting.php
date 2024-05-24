<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreSetting extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table   = 'store_settings',
    $fillable          = [ 'process_identifier', 'stastus_id' ];


}
