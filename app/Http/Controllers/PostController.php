<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        // Fetch all posts from the database
        $data = Post::cursorPaginate(8);
        // pass the posts to the view
        return view("post.index", ['posts' => $data, 'pageTitle' => 'Posts']);
    }

    function create()
    {
        Post::create([
            'title' => 'Post',
            'body' => 'This is the content of the new post.',
            'author' => 'Ahmad Alrefai',
            'published' => true,
        ]);
        return redirect('/blog');
    }

    function delete($id)
    {
        Post::destroy($id);
        return redirect('/blog');
    }

    function show($id)
    {
        // Fetch a single post by its ID
        $post = Post::findOrFail($id);
        // pass the post to the view
        return view("post.show", ['post' => $post, 'pageTitle' => $post->title . ' - ' . $post->id]);
    }
}
