<?php

namespace App\Http\Controllers;
Use Session;
use Illuminate\Http\Request;
use App\Dosen;
class DosenController extends Controller
{
      public function logind(Request $request) {
      $guru = Dosen::where('nidn', $request->nidn)->first();
      $pass = Dosen::where('passwords', $request->passwords)->first();
      
      
      if ($guru && $pass) {
          Session::put('user_type', 'dosen');
          Session::put('id', $guru->id);
          Session::put('nidn', $guru->nidn);
          Session::put('nama', $guru->nama);
          Session::put('status', $guru->status);
          Session::put('jabatan', $guru->jabatan);
         

          return redirect('/dashboard');
      } else {
          return redirect('/logindosen')->withSuccess('Username atau Password salah!');
      }
    }

     public function logindosen() {

     	 return view('dosen.login');
     }
}
