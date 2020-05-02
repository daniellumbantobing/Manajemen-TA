<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
class RegisterController extends Controller
{

    public function __construct(){
      $this->middleware('guest');
    }
      public function register()
    {
        $prodi = \App\Prodi::all();

    	return view('auths.register',compact(['prodi']));
    }
    public function postregister(Request $request)
    {

            $this->validate($request,[
                'nama_depan' => 'required|min:3',
                'nim' => 'required|unique:mahasiswa',
                'username' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'jenis_kelamin' => 'required',
                'agama' => 'required',
                'password' => 'required|min:5',
                'avatar' => 'mimes:jpeg,png'
            ]);
            
            $user = new \App\User;
            $user->role = 'siswa';
            $user->name= $request->nama_depan;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->remember_token =Str::random(60);
            $user->save();
            
            $request->request->add(['user_id' => $user->id]);
            $siswa = \App\Siswa::create($request->all());

            
            return redirect('/')->with('sukses','Pendaftaran berhasil');
    }
}
