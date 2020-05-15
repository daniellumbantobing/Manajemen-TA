<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documents;
class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = Documents::all();
        return view('document.index',compact(['file']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $file = Documents::where('user_id', auth()->user()->id)->get();
        return view('document.index',compact(['file']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = new Documents;
        if ($request->file('file')) {
            $file=$request->file('file');
            $filename=$file->getClientOriginalName();
            $request->file->move('storage/', $filename);
            $data->file= $filename;
        }
        $data->user_id = auth()->user()->id;
        $data->judul= $request->judul;
        $data->description = $request->description;
        $data->save(); 
        return redirect()->back()->with('sukses','Document berhasil diupload');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = Documents::find($id);
        return view('document.view',compact(['file']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($file){
        return response()->download('storage/'.$file);
    }

    public function edit(Documents $document)
    {
            return view('document.edit',compact(['document']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documents $document)
    {
        $document->update($request->all());

           if ($request->file('file')) {
            $file=$request->file('file');
            $filename=$file->getClientOriginalName();
            $request->file->move('storage/', $filename);
            $document->file= $filename;
       
        $document->save();
        }
        
        return redirect('/files/create')->with('sukses','Document berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documents $document)
    {
        $document->delete();
        return back()->with('sukses','Dokumen berhasil dihapus');
        
    }
}
