<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

abstract class Controller
{
    public  function __construct(Request $request) {
        $admin = $request->session()->get('isAdmin');
        View::share('admin',$admin);
    }
}
