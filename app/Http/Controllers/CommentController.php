<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect("/blog");
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect("/blog");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCommentRequest $request)
    {
        $post = Post::findOrFail($request->input('post_id'));

        $comment = new Comment();
        $comment->post_id = $request->input('post_id');
        $comment->comment = $request->input('comment');
        $comment->author = $request->input(key: 'author');
        $comment->save();

        return redirect("/blog/{$post->id}")->with('success', "Comment created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("comment.show", [
            'comment' => Comment::findOrFail($id),
            'pageTitle' => 'show Comment'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("comment.edit", [
            'comment' => Comment::findOrFail($id),
            'pageTitle' => 'Edit Comment'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $postId = $comment->post_id;
        $comment->delete();

        return redirect("/blog/{$postId}")->with('success', "Comment deleted successfully");
    }
}
