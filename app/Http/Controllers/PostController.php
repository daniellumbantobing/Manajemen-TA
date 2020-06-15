<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
class PostController extends Controller
{
    public function index()
    {
    	$posts = Post::all();
    	$users = User::all();
    	return view('posts.index',compact(['posts']));
    }

    public function add()
    {
    	return view('posts.add');
    }

    public function create(Request $request)
    {
        $post =  Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'thumbnail' => $request->thumbnail
        ]);

        return redirect()->route('posts.index')->with('sukses','Pengumuman berhasil disubmit');
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts')->with('sukses','Data post berhasil dihapus');   
    }
       public function edit(Post $post)
    {
            return view('posts.edit',compact(['post']));

    }
      public function update(Request $request, Post $post)
    {
            $post->update($request->all());
            return back()->with('sukses','Pengumuman berhasil diedit');

    }
}
