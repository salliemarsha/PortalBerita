<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller
{
    public function toggleLike(Post $post)
    {
        $like = Like::where('user_id', Auth::id())->where('post_id', $post->id)->first();
        if ($like) { $like->delete(); } else { Like::create(['user_id' => Auth::id(), 'post_id' => $post->id]); }
        return back();
    }

    public function toggleFavorite(Post $post)
    {
        $fav = Favorite::where('user_id', Auth::id())->where('post_id', $post->id)->first();
        if ($fav) { $fav->delete(); } else { Favorite::create(['user_id' => Auth::id(), 'post_id' => $post->id]); }
        return back();
    }
}
