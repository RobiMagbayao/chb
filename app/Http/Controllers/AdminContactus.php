<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage; 

class AdminContactus extends Controller
{
    public function index()
    {
        $contactMessages = ContactMessage::orderBy('created_at', 'desc')->get();

        return view('admin.adminContactus', ['contactMessages' => $contactMessages]);
    }


    public function destroy(int $id)
    {
        $contactMessage = ContactMessage::findOrFail($id);
        $contactMessage->delete();

        return redirect()->back()->with('status', 'Enquiry deleted successfully');
    }


    public function updateStatus(Request $request, int $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        ContactMessage::findOrFail($id)->update([
            'status' => $request->status,
        ]);

        return redirect('admin/contactus')->with('status', 'Enquiry status updated successfully');
    }



}

