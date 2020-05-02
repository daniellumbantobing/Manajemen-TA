<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
Use App\User;
Use Session;
class AuthController extends Controller
{



    public function __construct(){
      // $this->redirectTo = Route('/dashboard');
      $this->middleware('guest')->except('logout');
    }
    

    public function login()
    {


    	return view('auths.login');
    }

    public function postlogin(Request $request)
    {
                $this->validate($request,[

            'username' => 'required',
            'password' => 'required'
                    ]);

    	if(Auth::attempt($request->only('username','password'))){	   	
    	   	return redirect('/home');
    	 }else {
          return back()->with('sukses','Username atau password tidak sesuai!');
      }
    	
    }
    
}
