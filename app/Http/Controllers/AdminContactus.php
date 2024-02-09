<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage; 

class AdminContactus extends Controller
{
    public function index()
    {
        // Fetch contact messages from the database
        $contactMessages = ContactMessage::orderBy('created_at', 'desc')->get();

        return view('admin.adminContactus', ['contactMessages' => $contactMessages]);
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()->route('admin.adminContactus');
    }


    public function updateStatus(Request $request, ContactMessage $contactMessage)
    {
        // Validate the request data if needed
        $request->validate([
            'status' => 'required|in:Pending,Replied',
        ]);

        // Update the status of the contact message
        $contactMessage->status = $request->status;
        $contactMessage->save(); 

        return redirect()->route('admin.adminContactus');
    }


    
}

