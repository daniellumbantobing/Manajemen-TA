<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matakuliah;
class MatakuliahController extends Controller
{
    public function index(){

    	$matkul = Matakuliah::orderBy('semester_id','asc')->get();

    	return view('matakuliah.index',compact(['matkul']));
    }

    public function deletemt(Matakuliah $matakuliah){

    	$matakuliah->delete();
    	return back()->with('sukses','Data matakuliah berhasil dihapus');

    }
}
