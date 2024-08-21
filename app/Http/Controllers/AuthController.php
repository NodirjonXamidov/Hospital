<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        

    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required|number',
            'address'=>'required',
            'password'=>'required|min:4|max:5'
        ]);
        $user = new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->address=$request->address;
            $user->password=$request->password;
            $user->save();
        return redirect()->back();

    }
}
