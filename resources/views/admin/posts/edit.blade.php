@extends('layouts.admin')

@section('content')

    <div class="container">
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h1>Edit post</h1>
            <label for="name">Name </label>
            <input type="text" name="name" id="" value="{{ $post->name }}">

            <label for="image">Image</label>
            <input type="text" name="image" id="" value="{{ $post->image }}">

            <div class="form-group">
                <label for="category_id">Categories</label>
                <select class="form-control" name="category_id" id="category_id" value="{{ $post->category_id }}">
                    <option selected disabled>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    ​
                </select>
            </div>

            <div class=" mb-3">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Action</button>
                </div>
            </div>
        </form>
    </div>

@endsection
