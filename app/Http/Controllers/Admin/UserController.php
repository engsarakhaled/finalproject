<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('admin.users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request);
        $data = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'userName' => 'required|string',
            'email' => 'required|email', 
            'password' => 'required|confirmed', 
        ]);
        $data['password'] = Hash::make($request->password);
        $data['email_verified_at'] = now(); 
       // $data['active'] = 1;
        User::create($data);
       //dd($request);
        return redirect()->route('users.index');
    } 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users=User::FindorFail($id);
        return view('admin.edit_user',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'userName' => 'required|string',
            'email' => 'required|email', 
            'password' => 'sometimes|confirmed'
        ]);
        
        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        } else {
            $data['password'] = $user->password; //so in login is will go with the auth 
            //same username and password i made this solution because i found that the password hashing changes with anyupdate and in my code the login logic will not notic the user after that change
        }
        $data['active'] = isset($request->active) ? 1 : 0;  
        //dd($data);
        User::where('id',$id)->update($data); 
        return redirect()->route('users.index');
    }
}
