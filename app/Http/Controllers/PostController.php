<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::orderby('id', 'ASC')->get();

        return view('post.index', compact('post'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store (Request $request)
    {
        //validasi kolom
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        //insert ke table post
        Post::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);

        #untuk ngeread halaman post tampil
        return redirect()->route('post.index');
    }
    
    //menampilkan edit data
    public function edit($id)
    {
        $data = Post::findOrfail($id);

        return view('post.edit', compact('data'));
    }

    public function update (Request $request, $id)
    {
        //validasi kolom
        $request->validate( [
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        $data = Post::findOrfail($id);

        //insert ke table post
        $data->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        #untuk ngeread halaman post tampil
        return redirect()->route('post.index');
    }
    public function delete($id)
    {
        $data = Post::findOrfail($id);
        $data->delete();

        return redirect()->route('post.index');
    }

}