<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    public function index(){
        return view('contactus');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|min:2',
            'lastname' => 'required|string|min:2',
            'email' => 'required|email',
            'phone' => 'required|regex:/[0-9]{10}/',
            'message' => 'required|min:10',
        ]);

        ContactMessage::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
            'status' => 'Pending', 
        ]);

        return response()->json(['success' => true]);
    }
}
