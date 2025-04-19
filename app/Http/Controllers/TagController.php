<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->latest()->paginate(6);

        return view('posts.by-tag', compact('tag', 'posts'));
    }
}

