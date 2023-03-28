<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category_id');

//        $posts = Post::all('id','title');

        $posts = Post::query()->latest('created_at')->paginate(12);


//        $posts = array_filter($posts, function ($post) use ($search, $categoryId) {
//
//            if ($search && !str_contains($post->title, $search)) {
//                return false;
//            }
//
//            if ($categoryId && $post->category_id != $categoryId) {
//                return false;
//            }
//
//            return  true;
//        });


        return view('blog.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show($postId)
    {
        $post = cache()->remember("posts.{$postId}" , now()->addHour(), function () use ($postId) {
            return Post::query()->find($postId);
        });

//        $post = Post::query()->find($postId);

        return view('blog.show', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function like($postId)
    {
        //
    }

}
