@extends('layouts.admin')


@section('content')

    <h1>Create a new Post</h1>

    <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Post Name"
                aria-describedby="nameHelper" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control" aria-describedby="imageHelper"
                accept=".jpg,.png">
        </div>

        <div class="form-group">
            <label for="category_id">Categories</label>
            <select class="form-control" name="category_id" id="category_id">
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
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <button type="submit" class="btn btn-success">Save</button>


    </form>

@endsection
