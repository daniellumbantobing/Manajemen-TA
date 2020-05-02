<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
Use App\Post;
Use App\User;
Use Session;
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

}
