<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'category'])->latest()->get();
        
        return view('posts.index', compact('posts'));
    }

    public function create()
{
    
    $categories = Category::all();
    
    return view('posts.create', compact('categories'));
}

public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'body'        => 'required|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'user_id'     => auth()->id(),
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'slug'        => Str::slug($request->title) . '-' . Str::random(5),
            'image'       => $imagePath,
            'body'        => $request->body,
        ]);

        return redirect()->route('posts.index')->with('success', 'Berita berhasil diterbitkan!');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'body'        => 'required|string',
        ]);

        $imagePath = $post->image;

        if ($request->hasFile('image')) {
            if ($post->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($post->image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        $post->update([
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'slug'        => Str::slug($request->title) . '-' . Str::random(5),
            'image'       => $imagePath,
            'body'        => $request->body,
        ]);

        return redirect()->route('posts.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Post $post)
    {
        if ($post->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($post->image)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Berita berhasil dihapus!');
    }
}
