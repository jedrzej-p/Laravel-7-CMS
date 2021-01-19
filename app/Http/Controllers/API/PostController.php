<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Post;
use App\PostGroup;
use Auth;

class PostController extends Controller
{
    public function getAllPosts()
    {
        $posts = DB::table('posts')
            ->select('posts.title','posts.content','posts.date','users.name as autor','post_groups.name')
            ->join('users', 'posts.author_id', '=', 'users.id')
            ->join('post_groups', 'posts.group_id', '=', 'post_groups.id')
            ->get();
        return response()->json($posts);
    }
}
