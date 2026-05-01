<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // 1. ADD THIS: This handles GET /api/posts
    public function index()
    {
        // "with('user')" ensures post.user.name works in Next.js
        return response()->json(
            Post::with('user')->latest()->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required|string|max:255',
        ]);

        $post = Post::create([
            'user_id' => Auth::id(), 
            'caption' => $request->caption,
        ]);

        // Load the user relationship before returning so the UI can show it immediately
        return response()->json([
            'message' => 'Post created successfully', 
            'post' => $post->load('user')
        ], 201);
    }
}