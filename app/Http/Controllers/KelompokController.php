<?php

namespace App\Http\Controllers;
use App\Kelompok;
use App\Form;
use App\Siswa;
use App\Dosen;
use App\Jadwal;
use Illuminate\Http\Request;
use DB;


class KelompokController extends Controller
{
    public function kelompok()
    {
        $mahasiswa = Siswa::where('prodi_id',auth()->user()->siswa->prodi->id)->get();
        $kelompok = Kelompok::orderBy('noKel', 'asc')->get();
      	return view('siswa.kelompokTA',compact(['kelompok','mahasiswa']));
    }

    public function tambahKelompok(Request $request, Kelompok $kelompok)
    {    

         if ($kelompok->where('idMhs',auth()->user()->id)->exists()) {
            return redirect()->back()->with('error','Kelompok Anda sudah ada');    
        }
   
        $this->validate($request,[
            'noKel' => 'required',
            'judul' => 'required',
        ]);

 		$kel = new Kelompok;
 		$kel->noKel= $request->noKel;
        $kel->judul = $request->judul;
        $kel->idMhs = auth()->user()->id;
        $kel->namaMhs = auth()->user()->siswa->nama_depan;
        $kel->namaMhs1 = $request->namaMhs1;
        $kel->namaMhs2 = $request->namaMhs2;

        
        $kel->save(); 
        return redirect()->back()->with('sukses','Kelompok berhasil diupload');
    }
    public function hapusKelompok($id)
    {
        $kel = \App\Kelompok::find($id);
        $kel->delete($kel);
        return redirect()->back()->with('sukses','Kelompok berhasil diupload');
    }

    public function indexKelompok()
    {
        if (auth()->user()->role == 'koordinator' || auth()->user()->role == 'admin') {
        $kelompok = Kelompok::orderBy('noKel', 'asc')->get();
        $dosen = Dosen::orderBy('nama','asc')->get();
        }else{
        $kelompok = Kelompok::where('pembimbing',auth()->user()->name)
        ->orwhere('penguji',auth()->user()->name)->get();
        $dosen = Dosen::orderBy('nama','asc')->get();
            
        }
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
        $kel->user_id = auth()->user()->id;
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

    public function hapusform($id)
    {
       $kel = \App\Form::find($id);
        $kel->delete($kel);
        return redirect()->back()->with('sukses','Form Maju Sidang berhasil dihapus');
    }
      public function jadwal()
    {
        $jadwal = \App\Jadwal::all();
        return view('siswa.jadwal',compact(['jadwal']));  
    }

     public function tambahjadwal(Request $request)
    {   
   
        $this->validate($request,[
            'kelompok' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'tempat' => 'required',
          
        ]);

        $kel = new Jadwal;
        $kel->kelompok= $request->kelompok;
        $kel->tanggal = $request->tanggal;
        $kel->waktu = $request->waktu;
        $kel->tempat = $request->tempat;
        $kel->user_id = auth()->user()->id;
        
        $kel->save(); 
        return redirect()->back()->with('sukses','Jadwal berhasil dibuat');
    }

  public function hapusjadwal($id)
    {
       $kel = \App\Jadwal::find($id);
        $kel->delete($kel);
        return redirect()->back()->with('sukses','Jadwal Sidang berhasil dihapus');
    }

      public function jadwaledit($id){
        $jadwal = \App\Jadwal::find($id);
        return view('siswa.editJadwal',compact(['jadwal']));
    } 

      public function updatejadwal(Request $request,$id){
        // dd($request->all());
        $kelompok = \App\Jadwal::find($id);
        $kelompok->update($request->all());
        return redirect('/jadwal')->with('sukses','Jadwal kelompok berhasil diedit');
    }

    public function fetch(Request $request){
             if($request->ajax()) {
          
            $data = Siswa::where('nama_depan', 'LIKE', $request->country.'%')->orwhere('prodi_id', 'LIKE', $request->country.'%')
                ->get();
           
            $output = '';
           
            if (count($data)>0) {
              
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
              
                foreach ($data as $row){
                   
                    $output .= '<li class="list-group-item">'.$row->nama_depan.'</li>';
                }
              
                $output .= '</ul>';
            }
            else {
             
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
           
            return $output;
        }
    }

    public function konfirmasijadwal(Request $request)
    {
       $user = Jadwal::find($request->id);
        $user->status1 = $request->status;


            
        $user->save();

         return response()->json(['success'=>'Status change successfully.']);
    }

       public function konfirmasijadwal1(Request $request)
    {
       $user = Jadwal::find($request->id);
        $user->status2 = $request->status;


            
        $user->save();

         return response()->json(['success'=>'Status change successfully.']);
    }
}
