<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Comment::all();
        return view("comment.index", ['comments' => $data, 'pageTitle' => 'comments']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("comment.create", [
            'pageTitle' => 'Create Comment'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
