<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUsers extends Controller
{
    public function index()
    {
        $User = User::get();
        return view('admin.adminUsers',compact('User'));
    }

    public function create()
    {
        return view('admin.adminUsersCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|max:50|string',
            'lastname' => 'required|max:50|string',
            'email' => 'required|max:50|string|email|unique:users,email,',
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

        User::create([
            'firstname' =>  $request->firstname,
            'lastname' =>  $request->lastname,
            'email' =>  $request->email,
            'phone' =>  $request->phone,
            'address' =>  $request->address,
            'name' =>  $request->name,
            'password' =>  $request->password,
        ]);

        return redirect('admin/users/create')->with('status','User added');
        
    }

    public function edit(int $id)
    {
        $User = User::findOrFail($id);
        return view('admin.adminUsersEdit', compact('User'));
    }


    public function update(Request $request, int $id)
    {
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

        User::findOrFail($id)->update([
            'firstname' =>  $request->firstname,
            'lastname' =>  $request->lastname,
            'email' =>  $request->email,
            'phone' =>  $request->phone,
            'address' =>  $request->address,
            'name' =>  $request->name,
            'password' =>  $request->password,
        ]);

        return redirect()->back()->with('status','User details updated');
    }

    public function destroy(int $id)
    {
        $User = User::findOrFail($id);
        $User->delete();

        return redirect()->back()->with('status','User details deleted');
    }
}
