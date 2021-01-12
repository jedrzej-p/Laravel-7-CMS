<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->author_id = Auth::user()->id;
        $post->title    = $request->title;
        $post->content  = $request->content;
        $post->date     = $request->date;
        $post->save();

        return redirect()->route('admin.posts.index')->with('flash_message', 'Post został dodany pomyślnie.');
    }

    public function edit($id)
    {
        $post = Post::where('id',$id)->first();
        return view('admin.post.edit')->with(['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->date = $request->date;
        $post->save();
        return redirect()->route('admin.posts.index')->with('flash_message', 'Zaktualizowano post.');
    }

    public function index()
    {
        $posts = Post::with('users')->orderBy('date','desc')->get();
        return view('admin.post.index')->with(['posts' => $posts]);
    }

    public function destroy($id)
    {
        $post = Post::where('id', $id);
        $post->delete();
        return redirect()->back();
    }
}
