@extends('layouts.admin')

@section('content')

    <div class="container">
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h1>Edit post</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <label for="name">Name </label>
            <input type="text" name="name" id="" value="{{ $post->name }}">

            <div class="row">
                <div class="col">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="">
                </div>
                <div class="col">
                    <label for="image">Image: </label>
                    <input type="file" name="image" id="">
                </div>
            </div>

            <div class="form-group">
                <label for="category_id">Categories</label>
                <select class="form-control" name="category_id" id="category_id" value="{{ $post->category_id }}">
                    <option selected disabled>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <select multiple class="form-select" name="tags[]" id="tags">
                        <option disabled>Select all tags</option>

                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ $post->tags->contains($tag->id) ? 'selected' : '' }}>
                                {{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class=" mb-3">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Action</button>
                </div>
            </div>
        </form>
    </div>

@endsection
