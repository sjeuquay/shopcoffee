<?php

namespace App\Models\layout;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contact_us';
    public $timestamps = false;

    protected $fillable = ['first_name', 'last_name', 'is_current_customer', 'user_name', 'company', 'company_type', 'position','employee_number', 'zip_code', 'phone_number', 'email', 'contents'];
}
