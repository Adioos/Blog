<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(6);
        $postsCount = Post::count();
        if ($postsCount > 0) {
            $randomPosts = Post::inRandomOrder()->limit(4)->get();
        } else {
            $randomPosts = collect([]);
        }

        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);

        return view('post.index', compact('posts', 'randomPosts', 'likedPosts'));
    }
}
