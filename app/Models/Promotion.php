<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = "promotion";
    public $timestamps = false;
    protected $fillable = [
        'code','minium_eligible_amount','max_counts_allow','use_percentage','use_ammount','cap_percentage','cap_amount','expiration_date'
    ];

}
