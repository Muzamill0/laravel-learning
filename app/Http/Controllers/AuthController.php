<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_view(){
        return view('login');
    }

    public function login(Request $request){
        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credential = $request->except('_token');
        // dd($credential);
        if(Auth::attempt($credential)){
            dd(Auth::user());
        }else{
            return back()->with(['error' => 'invalid Credentials']);
        }

    }
}
