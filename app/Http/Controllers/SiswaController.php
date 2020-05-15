<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use \App\Siswa;
use \App\User;
use \App\Prodi;
use PDF;
use DB;
use Session;
class SiswaController extends Controller
{
    public function index(Request $request)
    {
    	// if($request->has('cari')){
    	// 	$data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->paginate(10);
    		
    	// }else{
	   $data_siswa  = \App\Siswa::paginate(10);
        $prodi = \App\Prodi::all();
        //$data_siswa = Siswa::Join('prodi','prodi.id','mahasiswa.prodi_id','mahasiswa.id')->paginate(10);        
 //   	}
    	return view('siswa.index',['data_siswa'=> $data_siswa, 'prodi' => $prodi]);
    }
    public function create(Request $request,User $user)
    {
  
     
        $this->validate($request,[
            'nama_depan' => 'required|min:3',
            'nim' => 'required|unique:mahasiswa',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            
            'avatar' => 'mimes:jpeg,png'
        ]);

        //Insert ke table user
        $user = new \App\User;
        $user->role = 'siswa';
        $user->username = $request->username;
        $user->email = $request->email;
        $user->name= $request->nama_depan;
        $user->password = bcrypt('rahasia');
        $user->remember_token =Str::random(60);
        $user->save();
        
        //Insert ke table siswa
        $request->request->add(['user_id' => $user->id]);
    	$siswa = \App\Siswa::create($request->all());
        if($request->hasFile('avatar')){
                    $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
                    $siswa->avatar = $request->file('avatar')->getClientOriginalName();
                    $siswa->save();
            } 
    	return redirect('/siswa')->with('sukses','Data berhasil ditambah');
    }
    public function edit(Siswa $siswa)
    {   
       /* $siswa = Siswa::findOrFail($id);*/
        $prodi = Prodi::get();
        $user = User::get();
           
    	return view('siswa.edit',['siswa'=> $siswa, 'prodi' => $prodi, 'user' => $user]);
    }

    public function update(Request $request,Siswa $siswa,User $user)
    {
    	//$siswa =Siswa::find($id);
        $user->update($request->all());
    	$siswa->update($request->all());
           /* $user = User::where('id',$request->id)
            ->update([
                'name' => $request->name
            ]);*/
            if($request->hasFile('avatar')){
                    $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
                    $siswa->avatar = $request->file('avatar')->getClientOriginalName();
                    $siswa->nama_depan = $request->nama_depan;
                    $siswa->save();
            }
    	return back()->with('sukses','Data berhasil diupdate');

    }
    public function delete(Siswa $siswa)
    {
    	 //$siswa = Siswa::find($id);
    	 $siswa->delete();
        
         return back()->with('sukses','Data berhasil dihapus');
    //     $post = \App\Siswa::findOrFail($id);
    //     $postGroups = \App\Siswa::where('id', $post->id)->get();
    // DB::table('users')->whereIn('id', $postGroups->pluck('user_id'))->delete();
    //  Siswa::where('id', $post->)->delete();
    
    }


  public function profile(Siswa $siswa){
        //$siswa = Siswa::find($id);
        $matapelajaran = \App\Matakuliah::all();
        
        //menyiapkan data untuk chart
        $categories= [];
        $data = [];

        foreach ($matapelajaran as $mp) {
            if($siswa->matakuliah()->wherePivot('matakuliah_id',$mp->id)->first()){
            $categories[] = $mp->nama;
            $data[] = $siswa->matakuliah()->wherePivot('matakuliah_id',$mp->id)->first()->pivot->nilai; 
            
            }
        }
         return view('siswa.profile',['siswa' => $siswa, 'matapelajaran' => $matapelajaran,'categories' => $categories, 'data' => $data]);
    }
        
     public function addnilai(Request $request,Siswa $siswa){
       
        //$siswa = Siswa::find($idsiswa);
        if ($siswa->matakuliah()->where('matakuliah_id',$request->mapel)->exists()) {
            return redirect('siswa/'.$siswa->id.'/profile')->with('error','Data matapelajaran sudah ada ');    
        }
        $siswa->matakuliah()->attach($request->mapel,['nilai' => $request->nilai]);

        return redirect('siswa/'.$siswa->id.'/profile')->with('sukses','Data berhasil dimasukkan'); 
    }
    
 public function deletenilai($idsiswa, $idmapel)
    {
        $siswa = Siswa::find($idsiswa);
        $siswa->matakuliah()->detach($idmapel);
        return redirect()->back()->with('sukses','Data nilai berhasil dihapus');
    }

     public function exportexel() 
    {
        return Excel::download(new SiswaExport, 'mahasiswa.xlsx');
    }
    public function exportpdf()
    {
          
          if ($siswa = \App\Siswa::where('prodi_id',1)->get()) {
                    
            $pdf = PDF::loadView('export.siswapdf', ['siswa' => $siswa]);
            return $pdf->download('mahasiswa.pdf');

          }else if ($siswa = \App\Siswa::where('prodi_id',3)->get()) {
              $pdf = PDF::loadView('export.siswapdf', ['siswa' => $siswa]);
            return $pdf->download('mahasiswa.pdf');
          }
     
    }

    public function cari(Request $request)
    {
         $prodi = \App\Prodi::all();
        $data_siswa  = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')
        ->orwhere('nim','LIKE','%'.$request->cari.'%')->paginate(10);

        return view('siswa/index',compact(['data_siswa','prodi']));

    }   
  

    public function profilsaya()
    {
        $siswa = auth()->user()->siswa;
        return view('siswa.profilsaya',compact(['siswa']));
    }

    public function SI(){

        $SI = \App\Siswa::where('prodi_id',1)->orderBy('nim', 'ASC')->paginate(10);
        
        return view('siswa.SistemInformasi',compact(['SI']));
    }

    public function TE(){

        $MR = \App\Siswa::where('prodi_id',3)->orderBy('nim', 'ASC')->paginate(10);
        
        return view('siswa.MR',compact(['MR']));
    }
    public function TI(){

        $TI = \App\Siswa::where('prodi_id',2)->orderBy('nim', 'ASC')->paginate(10);
        
        return view('siswa.TI',compact(['TI']));
    }
}
