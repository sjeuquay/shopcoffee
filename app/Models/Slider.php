<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table ='slider';
    public $timestamps = false;
    protected $fillable = [
        'slide_index','slide_content','slide_image','active'
    ];

}
