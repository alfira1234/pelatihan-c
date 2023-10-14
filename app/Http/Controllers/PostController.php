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

        return redirect()->route('post.index');
    }
}
