<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tag::withCount('posts')->get();
        return view("tag.index", [
            'pageTitle' => 'Tags',
            'tags' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tag.create", [
            'pageTitle' => 'Create Tag'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Todo:
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = Post::whereHas(
            'tags',
            function ($query) use ($id) {
                $query->where('slug', $id);
            }
        )->get();
        return view("tag.show", [
            'tag' => Tag::where('slug', $id)->firstOrFail(),
            'pageTitle' => 'Show Tag',
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("tag.edit", [
            'tag' => Tag::where('slug', $id)->firstOrFail(),
            'pageTitle' => 'Edit Tag'
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
