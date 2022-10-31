<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
 /**
     * Write Your Code..
     *
     * @return string
    */
    public function index()
    {
        $posts = Post::get();

        return view('post.index',compact('posts'));

    }

    /**
     * Write Your Code..
     *
     * @return string
    */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Write Your Code..
     *
     * @return string
    */
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::create($input);

        return redirect()->route('posts.index');
    }

    /**
     * Write Your Code..
     *
     * @return string
    */
    public function show($id)
    {
        $post = Post::find($id);

        return view('post.show',compact('post'));
    }
}
