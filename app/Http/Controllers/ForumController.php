<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use \App\Forum;
use \App\Komentar;
class ForumController extends Controller
{
    public function index(){

    	$forum = Forum::orderBy('created_at','desc')->paginate(10);
    	return view('forum.index',compact(['forum'])); 
    }


    public function create(Request $request){
    	$request->request->add(['user_id' => auth()->user()->id]);
    	$forum = Forum::create($request->all());
    	return redirect()->back()->with('sukses','Forum berhasil ditambahkan');
    }

    public function view($id){

    $forum = Forum::where('id',$id)->first();
    $kmn = Komentar::where('forum_id',$id)->get();

    	return view('forum.view',compact(['forum','kmn']));

    }

	public function created(Request $request,Forum $forum){
    	/*$request->request->add(['user_id' => auth()->user()->id]);
    	$forum = Komentar::create($request->all());
    	*/
    	$comment = New Komentar;
    	$comment->konten = $request->konten;
    	$comment->user_id = auth()->user()->id;

    	$forum->komentar()->save($comment);  
    	return redirect()->back()->with('sukses','Forum berhasil ditambahkan');


    }    

  public function deletekm(Komentar $komentar){

    	$komentar->delete();
    	return back()->with('sukses','Data matakuliah berhasil dihapus');

    }

  public function updatekm(Request $request,Komentar $komentar,Forum $forum){
         
           
    	$komentar->update($request->all());
    	return  back()->with('sukses','Komentar berhasil diupdate');

    }


  public function editkm(Komentar $komentar){
    $forum = Forum::all();
          
    return view('forum.editkm',compact(['komentar','forum']));
    }
}
