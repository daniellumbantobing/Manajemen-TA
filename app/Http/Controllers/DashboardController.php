<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Post;
class DashboardController extends Controller
{
    public function index()
    {
    // 	$siswa = Siswa::all();
    // 	$siswa->map(function($s){
    // 		$s->rataratanilai = $s->rataratanilai();
    // 		return $s; 
    // 	});
    // $siswa = 	$siswa->sortByDesc('rataratanilai')->take(5);

    //	return view('dashboards.index',['siswa' => $siswa]);
        $posts = Post::all();
        return view('dashboards.index',compact(['posts']));
    }
     
}
