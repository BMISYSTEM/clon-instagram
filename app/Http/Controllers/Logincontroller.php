<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Logincontroller extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(!(auth()->attempt($request->only('email','password'),$request->remember)))
        {
            return back()->with('mensaje','credenciales incorrectas');
        }
        return redirect()->route('post.index',auth()->user()->username);
        // return redirect($request->username);
    }
}
