<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller 
{
    
    public function index(){
        $supervisors = User::where('role_id',2)->get();

        return view('user.index',[
            'supervisors' => $supervisors
        ]);
    }

    public function create(){
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'password' => 'required',
            'role_id' => 'required|integer'        
        ]);
        User::create($request->all());

        return redirect()->route('user.index')->with('success','Supervisor added successfully..');
    }
    
}
