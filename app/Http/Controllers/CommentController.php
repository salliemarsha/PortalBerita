<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        Comment::create([
            'user_id' => auth()->id(), 
            'post_id' => $postId,      
            'body' => $request->body,  
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}
