<?php

namespace App\Http\Controllers;
Use Session;
use Illuminate\Http\Request;
use App\Dosen;
use App\User;
use Illuminate\Support\Str;
class DosenController extends Controller
{
     public function index(){
      $dosen = Dosen::orderBy('created_at', 'asc')->get();
      return view('dosen.index',compact(['dosen']));
     }

     public function profile($id)
    {
    	$dosen = Dosen::find($id);
    	return view('guru/profile',['dosen' => $dosen]);
    }   

    public function createdosen(Request $request)
    {
      $this->validate($request,[
                'name' => 'required|min:3',
                'username' => 'required|unique:users',
                'role' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:5',
                'avatar' => 'mimes:jpeg,png'
            ]);
            $user = new \App\User;
            $user->role = $request->role;
            $user->name= $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->remember_token =Str::random(60);
            $user->save();
            
        
       return back()->with('sukses','Akun Dosen Berhasil dibuat');;
    }
}
