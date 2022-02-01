<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function posts(Tag $tag)
    {

        $posts = $tag->posts()->paginate(10);

        return view('guest.tags.index', compact('posts', 'tag'));
    }
}