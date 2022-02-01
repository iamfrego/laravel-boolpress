<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts()->orderByDesc('id')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ddd($request->all());
        $validated = $request->validate([
            'name' => ['required', 'unique:posts', 'max:200'],
            'image' => ['nullable', 'image', 'max:1500'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);

        if ($request->file('image')) {
            $image_path = Storage::put('post_images', $request->file('image'));
            $validated['image'] = $image_path;
        }

        // ddd($validated);


        //ddd($validated);
        $validated['slug'] = Str::slug($validated['name']);
        $validated['user_id'] = Auth::id();

        $post = Post::create($validated);
        if ($request->has('tags')) {
            $request->validate([
                'tags' => ['nullable', 'exists:tags,id']
            ]);
            $post->tags()->attach($request->tags);
        }
        // ddd($validated);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('guest.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();


        if (Auth::id() === $post->user_id) {
            return view('admin.posts.edit', compact('post', 'categories', 'tags'));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (Auth::id() === $post->user_id) {

            $validated = $request->validate([
                'name' => ['required', Rule::unique('posts')->ignore($post->id), 'max:200'],
                'image' => ['nullable', 'image', 'max:1500'],
                'category_id' => ['nullable', 'exists:categories,id'],
                'tags' => ['nullable', 'exists:tags,id']
            ]);


            if ($request->file('image')) {

                Storage::delete($post->image);

                $image_path = $request->file('image')->store('post_image');

                $validated['image'] = $image_path;
            }

            if ($request->has('tags')) {
                $request->validate([
                    'tags' => ['nullable', 'exists:tags,id']
                ]);
                $post->tags()->sync($request->tags);
            }

            $post->update($validated);

            return redirect()->route('admin.posts.index');
        } else {
            abort(403);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Auth::id() === $post->user_id) {
            $post->delete();
            return redirect()->route('admin.posts.index');
        } else {
            abort(403);
        }
    }
}