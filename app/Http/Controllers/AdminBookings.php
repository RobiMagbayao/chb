<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminBookings extends Controller
{
    public function index()
    {
        return view('admin.adminBookings');
    }
}
