<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
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
        $data = Post::latest()->paginate(8); // Using cursor pagination for better performance with large datasets
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
    public function store(BlogPostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->author = $request->input('author');
        $post->published = $request->has('publushed');

        $post->save();

        return redirect('/blog')->with('success', 'Post created successfully!');
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
        $post = Post::findOrFail($id);
        return view("post.edit", ['post' => $post, 'pageTitle' => 'Edit Post']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->author = $request->input('author');
        $post->published = $request->has('published');
        $post->update();


        return redirect('/blog/' . $post->id)->with('success', 'Post updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the post by ID
        $post = Post::findOrFail($id);

        // Delete the post
        $post->delete();

        // Redirect back to the posts index with a success message
        return redirect('/blog')->with('success', 'Post deleted successfully!');
    }
}
