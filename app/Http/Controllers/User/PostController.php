<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
//        $posts = Post::all('id','title');

        $posts = Post::query()->latest('created_at')->paginate(12);

        return view('user.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('user.posts.create');
    }

    public function store(Request $request)
    {
        $validated  = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
            'published_at' => ['nullable', 'string', 'date'],
        ]);

        $post = new Post();
//        $post->user_id = Auth::id();
        $post->user_id = 10;
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->published_at = $validated['published_at'] ?? null;
        $post->save();

        return redirect()->route('user.posts.show', $post->id);
    }

    public function show(Request $request, $postId)
    {
        $post = Post::query()->find($postId);

        return view('user.posts.show', compact('post'));
    }

    public function edit($postId)
    {
        $post = Post::query()->find($postId);

        return view('user.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated  = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
            'published_at' => ['nullable', 'string', 'date'],
        ]);

        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->published_at = $validated['published_at'] ?? null;
        $post->save();
        return redirect()->route('user.posts.show', $post->id);
    }

    public function delete($post)
    {
        return redirect()->route('user.posts');
    }

    public function like()
    {
        return 'like';
    }
}
