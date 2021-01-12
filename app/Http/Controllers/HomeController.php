<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('users')->orderBy('date','desc')->get();
        return view('home')->with(['posts' => $posts]);
    }

    public function getPost($id)
    {
        $post = Post::where('id', $id)->with('users')->first();
        return view('detail')->with(['post' => $post]);
    }
}
