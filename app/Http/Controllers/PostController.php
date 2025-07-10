<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all posts from the database
        $data = Post::cursorPaginate(8); // Using cursor pagination for better performance with large datasets
        // pass the posts to the view
        return view("post.index", ['posts' => $data, 'pageTitle' => 'Posts']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("post.create", ['pageTitle' => 'Create Post']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // @TODO: 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch a single post by its ID
        $post = Post::findOrFail($id);
        // pass the post to the view
        return view("post.show", ['post' => $post, 'pageTitle' => $post->title . ' - ' . $post->id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("post.edit", ['pageTitle' => 'Edit Post']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // @TODO:
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // @TODO:
    }
}
