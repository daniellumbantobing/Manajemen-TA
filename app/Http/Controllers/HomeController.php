<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class HomeController extends Controller
{
    public function index(Request $request)
{
  if (Session::has('role')) {

      return view('dashboards.index');
  }
  else{
        
 
    return redirect('/login');
    
  }
  } 
}
