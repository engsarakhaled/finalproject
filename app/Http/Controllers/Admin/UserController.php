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
        $data['password'] = Hash::make(Str::password(30));
        $data['active'] = isset($request->active) ? 0 : 1;  //default is one if i has request =0 and it will never have here
        $data['email_verified_at'] = now(); 
        User::create($data);
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
        $data = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'userName' => 'required|string',
            'email' => 'required|email', 
            'password' => 'nullable|confirmed'
        ]);
        //dd($data);
        $data['password'] = Hash::make(Str::password(30));
        $data['active'] = isset($request->active) ;  
        User::where('id',$id)->update($data); 
        return redirect()->route('users.index');
    }
}
