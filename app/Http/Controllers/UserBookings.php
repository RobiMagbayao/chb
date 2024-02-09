<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserBookings extends Controller
{
    public function index()
    {
        return view('users.userBookings');
    }
}
