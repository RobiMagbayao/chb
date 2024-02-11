<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userUpdateProfileController extends Controller
{
    public function index()
    {
        return view('users.userUpdateProfile');
    }
}
