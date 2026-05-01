<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required|string|max:255',
        ]);

        $post = Post::create([
            'user_id' => Auth::id(), // This gets the ID from the Sanctum token
            'caption' => $request->caption,
        ]);

        return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
    }
}
