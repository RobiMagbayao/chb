<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function edit()
    {
        return view('users.userProfileEdit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $id = $user->id;

        $request->validate([
            'firstname' => 'required|max:50|string',
            'lastname' => 'required|max:50|string',
            'email' => 'required|max:50|string|email|unique:users,email,'. $id,
            'phone' => 'required|max:10|string',
            'address' => 'required|max:100|string',
            'name' => 'required|max:15|string',
            'password' => [
                'required',
                'string',
                'min:8', 
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            ],
        ], [
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least :min characters long.',
            'password.regex' => 'Password must contain at least 1 lowercase letter, 1 uppercase letter, 1 digit, and 1 special character.',
        ]);
    
        $user->update([
            'firstname' =>  $request->firstname,
            'lastname' =>  $request->lastname,
            'email' =>  $request->email,
            'phone' =>  $request->phone,
            'address' =>  $request->address,
            'name' =>  $request->name,
            'password' =>  $request->password,
        ]);
    
        return redirect()->back()->with('status','User profile updated');
    }


    public function destroy()
    {
        $user = Auth::user();
        $user->delete();

        return redirect()->back()->with('status','User profile deleted');
    }
}
