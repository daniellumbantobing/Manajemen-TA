<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
Use App\Post;
Use App\User;
Use Session;
use Hash;
use Auth;
class SiteController extends Controller
{
    public function home()
    {
        $posts = Post::all();
        return view('site.home',compact(['posts']));
       
      
    }

    public function about()
    {
    	return view('site.about');
    }
    
         public function registerok()
    {
        return view('site.register');
    }

   

    public function singlepost($slug)
    {
        $post = Post::where('slug', '=', $slug)->first(); 
        return view('site.singlepost',compact(['post']));
    }

    public function changepass(){

        return view("auths.ubahpass");
    }
 
    public function changepassword(Request $request){

        if(!(Hash::check($request->get('current_password'),Auth::user()->password))){
            return back()->with('error','Password lama tidak sesuai');
        }
        if(strcmp($request->get('current_password'),$request->get('new_password')) == 0){
            return back()->with('error','Password lama tidak bisa sama dengan password baru');
        }

        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|confirmed',
            'new_password_confirmation' => 'required'
        ],[
            'new_password.confirmed' => 'Password tidak sama'
            
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return back()->with('sukses','Password berhasil diganti');
    }
}
