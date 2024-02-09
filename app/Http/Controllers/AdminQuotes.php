<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminQuotes extends Controller
{
    public function index()
    {
        return view('admin.adminQuotes');
    }
}
