<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMessages extends Controller
{
    public function index()
    {
        return view('admin.adminMessages');
    }
}
