<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\PostGroup;
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
        $categories = PostGroup::get();
        return view('admin.post.create')->with(['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->author_id    = Auth::user()->id;
        $post->title        = $request->title;
        $post->content      = $request->content;
        $post->date         = $request->date;
        $post->group_id     = $request->category_id;
        $post->save();

        return redirect()->route('admin.posts.index')->with('flash_message', 'Post został dodany pomyślnie.');
    }

    public function edit($id)
    {
        $post = Post::where('id',$id)->first();
        $categories = PostGroup::get();
        return view('admin.post.edit')->with(['post' => $post, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();
        $post->title    = $request->title;
        $post->content  = $request->content;
        $post->date     = $request->date;
        $post->group_id = $request->category_id;
        $post->save();
        return redirect()->route('admin.posts.index')->with('flash_message', 'Zaktualizowano post.');
    }

    public function index()
    {
        $posts = Post::with('users','category')->orderBy('date','desc')->get();
        return view('admin.post.index')->with(['posts' => $posts]);
    }

    public function destroy($id)
    {
        $post = Post::where('id', $id);
        $post->delete();
        return redirect()->back();
    }
}
