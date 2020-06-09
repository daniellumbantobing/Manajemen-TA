<?php

namespace App\Http\Controllers;
use App\Kelompok;
use App\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelompokController extends Controller
{
    public function kelompok()
    {

        $kelompok = Kelompok::orderBy('noKel', 'asc')->get();
      	return view('siswa.kelompokTA',compact(['kelompok']));
    }

    public function tambahKelompok(Request $request)
    {
   
        $this->validate($request,[
            'noKel' => 'required',
            'judul' => 'required',
        ]);

 		$kel = new Kelompok;
 		$kel->noKel= $request->noKel;
        $kel->judul = $request->judul;
        $kel->idMhs = auth()->user()->id;
        $kel->namaMhs = auth()->user()->name;
        
        $kel->save(); 
        return redirect()->back()->with('sukses','Kelompok berhasil di upload');
    }
    public function hapusKelompok($idKel)
    {
        $kel = \App\Kelompok::find($idKel);
        $kel->delete($kel);
        return redirect()->back()->with('sukses','Kelompok berhasil di upload');
    }

    public function indexKelompok()
    {
    	$kelompok = Kelompok::orderBy('noKel', 'asc')->get();
    	$dosen = Dosen::orderBy('nama','asc')->get();
      	return view('dosen.indexKelompok',['kelompok'=>$kelompok,'dosen'=>$dosen]);
    }
	public function alokasi(Request $request)
	{
		DB::table('kelompok')->where('noKel',$request->noKel)->update([
			'pembimbing' => $request->pembimbing,
			'penguji' => $request->penguji,
		]);
		return redirect()->back()->with('sukses','alokasi pembimbing dan penguji berhasil di upload');
	 
	}
}
