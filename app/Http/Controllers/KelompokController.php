<?php

namespace App\Http\Controllers;
use App\Kelompok;
use App\Form;
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
    public function hapusKelompok($id)
    {
        $kel = \App\Kelompok::find($id);
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
  public function editKelompok($id){
        $kelompok = \App\Kelompok::find($id);
        return view('siswa.editKelompok',['kelompok'=> $kelompok]);
    } 
    
    public function update(Request $request,$id){
        // dd($request->all());
        $kelompok = \App\Kelompok::find($id);
        $kelompok->update($request->all());
        return redirect('/kelompok')->with('sukses','Data kelompok berhasil diedit');
    }

    public function history(){
      $log = \App\Log::get();
      $kelompok = Kelompok::get();
      return view('siswa.history',compact(['log','kelompok']));

    }

    public function hapusHistory($id)
    {
        $kel = \App\Log::find($id);
        $kel->delete($kel);
        return redirect()->back()->with('sukses','History berhasil dihapus');
    }

    public function form()
    {
        $form = \App\Form::all();
        
        return view('siswa.form',compact(['form']));
    }

     public function formcreate(Request $request)
    {
        $this->validate($request,[
            'noKel' => 'required',
            'judul' => 'required',
        ]);

        $kel = new Form;
        $kel->noKel= $request->noKel;
        $kel->judul = $request->judul;
        $kel->status = $request->status;
        $kel->save(); 

        return redirect()->back()->with('sukses','History berhasil dikirim');
    }
    public function konfirmasi(Request $request)
    {
       $user = Form::find($request->id);
        $user->status = $request->status;
        $user->save();

         return response()->json(['success'=>'Status change successfully.']);
    }
}
