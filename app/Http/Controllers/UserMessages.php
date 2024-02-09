<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserMessages extends Controller
{
    public function index()
    {
        return view('users.userMessages');
    }
}
